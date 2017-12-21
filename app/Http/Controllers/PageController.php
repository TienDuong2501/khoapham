<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;  
use App\Bill;
use App\BillDetail;
use App\User;
use Validation;
use Hash;
use DB;
use Auth;
class PageController extends Controller
{
    public function getIndex()
    {
        //lay du lieu tu bang slide
        $slides = Slide::all();
        // print_r($slides);
        // exit;
        //do du lieu san pham 
        $New_product = Product::where('new',1)->paginate(8);
        // dd($New_product);

        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
    	return view('pages.trangchu',compact('slides','New_product','sanpham_khuyenmai'));
    }

    public function getLoaisanpham($id_type)
    {
        $sp_theoloai = Product::where('id_type',$id_type)->get();
        // dd($sp_theoloai);

        $sanpham_khac = Product::where('id_type','<>',$id_type)->paginate(3);

        $loai = ProductType::all();

        $loai_sp = ProductType::where('id',$id_type)->first();
    	return view('pages.loaisanpham',compact('sp_theoloai','sanpham_khac','loai','loai_sp'));
    }


    public function getChitietsanpham(Request $request)
    {
        $sanpham = Product::where('id',$request->id)->first();

        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(6);
    	return view('pages.chitietsanpham',compact('sanpham','sp_tuongtu'));
    }


    public function getLienhe()
    {
    	return view('pages.lienhe');
    }

    public function getGioithieu()
    {
    	return view('pages.gioithieu');
    }


    public function getAddToCart(Request $request,$id)
    {
        //kiem tra xem co san pham mang id nay hay ko.
        $product = Product::find($id);
        //kiem tra xem sesion co san pham nao chua
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart); 
        //goi phuong thuc them gio hang
        $cart->add($product,$id);
        //gan giỏ hàng vào session('cart')
        $request->Session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDeleteToCart($id)
    {
        //kiem tra xem co san pham hay khong
        $old = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($old);
        $cart->removeItem($id);
        if(count($cart->items) > 0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        
        return redirect()->route('trangchu');
    }

    public function getCheckOut()
    {
        // $product = Product::find($id);
        return view('pages.checkout');
    }

    public function postCheckOut(Request $request)
    {
        $cart = Session::get('cart');
        // dd($cart);
        //luu thong itn khach hang
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->diachi;
        $customer->phone_number = $request->sdt;
        $customer->note = $request->ghichu;
        $customer->save();


        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note = $request->ghichu;
        $bill->save();

        foreach( $cart->items as $key => $value)
        {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity  = $value['qty'];
            $bill_detail->unit_price  = $value['price']/$value['qty'];
            $bill_detail->save();


        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao','dat hang thanh cong');
        


    }


    public function getLogin()
    {
        return view('pages.login');
    }

    public function getDangKy()
    {
        return view('pages.signup');
    }

    public function postDangKy(Request $request)
    {
        $this->validate
        ($request,[


            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'fullname' => 'required',
            'phone'   => 'required|min:10|max:11',
            'address' => 'required',
            're_password' => 'required|same:password',
        ],
        [
            



            'email.required' => 'vui long nhap email',
            'email.email' => 'khogn dung dinh dang email',
            'email.unique' => 'email nay da co nguoi su dung',

            'password.required' => 'nhap vao password',
            'password.min' => 'mat khau it nhat 6 ky tu',
            'password.max' => 'mat khau toi da 20 ky tu',

            'fullname.required' => 'dien vao ten cua ban',

            'phone.required' => 'dien vao so dien thoai cua ban',
            'phone.min' => 'sdt phai co it nhat 10 so',
            'phone.max' => 'sdt khong qua 11 so',

            'address.required'  => 'khong duoc de trong dia chi',
            
            're_password.required' => 'nhap  xac nhan mat khau',
            're_password.same' => 'mat khau khong trung khop',
        ]);

        $user = new User();

        $user->full_name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->remember_token = $request->_token;
        $user->save();

        return redirect()->back()->with('thongbao','tao tai khoan thanh cong');
    }


    public function postLogin(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ],
        [
            'email.required' => 'vui long nhap email',
            'email.email' => 'email khong dung dinh dang',

            'password.required' => ' vui long nhap password',
            'password.min' => 'password khong duoc duoi 6 ky tu',
            'password.max' => 'password khong duoc qua 20 ky tu'
        ]);


        //chung thuc nguoi dung
        $credentials =  array('email' => $request->email,'password' => $request->password);
        if(Auth::attempt($credentials))
            {
                return redirect()->back()->with(['flag' => 'success','message' => 'dang nhap thanh cong']);
            }
        else
        {
            return redirect()->back()->with(['flag' => 'danger','message' => 'mat khau hoac email chua hop le']);
        }
    }


    public function postDangXuat()
    {
        Auth::logout();
        return redirect()->route('trangchu');
    }


    public function getTimKiem(Request $request)
    {
        //tim kiem theo ten,theo gia
        $product = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price','like','%'.$request->key.'%')->get();

        return view('pages.timkiem',compact('product'));
    }




}
