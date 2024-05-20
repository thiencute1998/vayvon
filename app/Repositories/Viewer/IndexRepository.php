<?php

namespace App\Repositories\Viewer;

use App\Models\About;
use App\Models\Certificate;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Quote;
use App\Models\Slide;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class IndexRepository extends BaseRepository {
    public function model()
    {
        return Product::class;
    }

    public function index() {
        $products = $this->model->where('type', 2)->where('status', 1)->get();
        $slides = Slide::where('status', 1)->orderBy('created_at', 'desc')->get();
        $certificates = Certificate::where('status', 1)->get();
        return view('viewer.pages.index', compact('products', 'certificates', 'slides'));
    }

    public function quote() {
        $products = $this->model->where('status', 1)->where('type', 1)->get();

        return view('viewer.pages.quote', compact('products'));
    }

    public function requestQuote($params) {
        DB::beginTransaction();
        try {
            $quote = new Quote;
            if (isset($params['interest_in'])) {
                $params['interest_in'] = implode(",", $params['interest_in']);
            }
            $quote->fill($params);
            $quote->save();
            if (isset($params['products'])) {
                $arrProduct = [];
                foreach ($params['products'] as $product){
                    $arrProduct[] = [
                        "product_id"=> $product,
                        "quote_id" => $quote->id
                    ];
                }
                $quote->products()->attach($arrProduct);
            }
            $this->sendMail($params);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return 1;
    }

    public function about() {
        $about = About::where('id', 1)->firstOrFail();
        return view('viewer.pages.about', compact('about'));
    }

    public function contact() {
        return view('viewer.pages.contact');
    }

    public function sendContact($params) {
        DB::beginTransaction();
        try {
            $contact = new Contact;
            $contact->fill($params);
            $contact->save();
            $this->sendMail($params);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return 1;
    }

    public function slug($slug) {
        return $this->model->where('status', 1)->where('slug', $slug)->with('productDetails')->firstOrFail();
    }

    public function sendMail($params) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer();
        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth   = true;
            $mail->Username   = env('PHPMAILER_USERNAME');
            $mail->Password   = env('PHPMAILER_PASSWORD');
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;

            $config = Config::first();
            $toMail = $config ? $config->email : "dtuan5161@gmail.com";
            $mail->addAddress($toMail);

            $mail->isHTML(true);  // Set email content format to HTML

            $mail->Subject = $params['name'];
            $html = "<b>Info:</b><br><br>";
            $html .= "Name: " . $params['name'] . "<br>";
            $html .= "Email: " . $params['email'] . "<br>";
            if (isset($params['phone'])) {
                $html .= "Phone: " . $params['phone'] . "<br>";
            }
            if (isset($params['position'])) {
                $html .= "Position: " . $params['position'] . "<br>";
            }
            if (isset($params['business'])) {
                $html .= "Business: " . $params['business'] . "<br>";
            }
            if (isset($params['subject'])) {
                $html .= "Subject: " . $params['subject'] . "<br>";
            }
            if (isset($params['interest_in'])) {
                $html .= "Intersted in: " . $params['interest_in'] . "<br>";
            }
            if (isset($params['products'])) {
                $html .= "Products: <br>";
                foreach ($params['products'] as $productID) {
                    $product = Product::where('status', 1)->where('id', $productID)->first();
                    if ($product) {
                        $html .= $product->name . "<br>";
                    }
                }
            }
            if (isset($params['message'])) {
                $html .= "Message: ";
                $html .= "<br><br>";
                $html .= $params['message'];
            }

            $mail->Body = $html;
            $mail->CharSet = "UTF-8";

            if( !$mail->send() ) {
                return false;
            }
            else {
                return true;
            }

        } catch (Exception $e) {
            return "error,Message could not be sent.";
        }
    }
}
