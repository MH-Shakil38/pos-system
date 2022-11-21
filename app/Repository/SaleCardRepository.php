<?php

namespace App\Repository;

use App\Models\admin\Customer;
use App\Models\admin\Product;
use App\Models\admin\Purchase;
use App\Models\admin\PurchaseDetails;
use App\Models\SaleCard;

class SaleCardRepository
{
    public function PruductQuery($id){
        $product = PurchaseDetails::query()->where('product_id', $id)->first();
        $price = $product->selling_price;
        return $price;
    }

    public function customer_previews_sale_card($customer_id){
        $html_data = '';
        $old_customers = SaleCard::query()->where('customer_id',$customer_id)->with('customer','product')->get();
        foreach ($old_customers as $val){
            $html_data .= '<tr>
                        <td class="productimgname">
                            <a class="product-img">
                                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg" alt="product">
                            </a>
                            <a href="javascript:void(0);">' . $val->product->name . '</a>
                        </td>
                        <td >' . $val->qty . '</td>
                        <td>' . $val->brand->name . '</td>
                        <td>' . $val->color->name . '</td>
                        <td>' . $val->size->name . '</td>
                        <td><span>৳ '.$val->selling_price.'</span></td>
                        <td class="text-end">৳ ' . $val->total_price . '<span></span></td>
                        <td>
                            <a class="delete-set"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="svg"></a>
                        </td>
                    </tr>';;
        }
        return $html_data;
    }

    public function customer_details($customer_id){
        $customer = Customer::query()->where('id',$customer_id)->first();
        $customer_details = '';
        $customer_details.='
                        <h3>'.$customer->name.'</h3>
                        <span>'.$customer->phone.'</span>
                        <br>
                        <span>'.$customer->email.'</span><br>
                        <span>'.$customer->address.'</span><br>
                        ';
        return $customer_details;
    }
    public function load_recent_add_product($recent){
        $html_data = '';
        $html_data = '';
        $html_data .= '
                    <tr>
                        <td class="productimgname">
                            <a class="product-img">
                                <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg" alt="product">
                            </a>
                            <a href="javascript:void(0);">' . $recent->product->name . '</a>
                        </td>
                        <td >' . $recent->qty . '</td>
                        <td>' . $recent->brand->name . '</td>
                        <td>' . $recent->color->name . '</td>
                        <td>' . $recent->size->name . '</td>
                        <td><span>৳ '.$recent->selling_price.'</span></td>
                        <td class="text-end">৳ ' . $recent->total_price . '<span></span></td>
                        <td>
                            <a class="delete-set"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="svg"></a>
                        </td>
                    </tr>';
       return $html_data;
    }
    public function save_product_saleCard($data){
        $data['total_price'] = $data['qty'] * $data['selling_price'];
        $data_save = SaleCard::query()->create($data);
        return $data_save;
    }

}
