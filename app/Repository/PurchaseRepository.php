<?php

namespace App\Repository;

use App\Models\PurchaseCard;

class PurchaseRepository
{
    public static function supplierOldData($supplier_id): string
    {
        $purchase = PurchaseCard::query()->where('supplier_id',$supplier_id)->with(['product','brand','category','color','size','origin','supplier'])->get();
        $html_data = '';
        foreach ($purchase as $card){
            $html_data.='
                            <tr>
                                <td class="productimgname">
                                    <a class="product-img">
                                        <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">'.$card->product->name.'</a>
                                </td>
                                <td >'.$card->qty.'</td>
                                <td>'.$card->category->name.'</td>
                                <td>'.$card->brand->name.'</td>
                                <td>'.$card->color->name.'</td>
                                <td>'.$card->size->name.'</td>
                                <td>'.$card->origin->name.'</td>
                                <td ><span>৳ '.$card->purchase_price.'</span></td>
                                <td ><span>৳ '.$card->selling_price.'</span></td>
                                <td class="text-end"> <span>৳ '.$card->total.'</span></td>
                                <td>
                                    <a class="delete-set"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="svg"></a>
                                </td>
                            </tr>';
        }
        return $html_data;
    }
    public static function appendSupplierRow($card): string
    {
        $html_data = '';
        $html_data .= '
            <tr>
            <td class="productimgname">
                <a class="product-img">
                    <img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/product/product7.jpg" alt="product">
                </a>
                <a href="javascript:void(0);">' . $card->product->name . '</a>
            </td>
            <td >' . $card->qty . '</td>
            <td>' . $card->category->name . '</td>
            <td>' . $card->brand->name . '</td>
            <td>' . $card->color->name . '</td>
            <td>' . $card->size->name . '</td>
            <td>' . $card->origin->name . '</td>
            <td><span>৳ '.$card->purchase_price.'</span></td>
            <td><span>৳ '.$card->selling_price.'</span></td>
            <td class="text-end">৳ ' . $card->total . '<span></span></td>
            <td>
                <a class="delete-set"><img src="https://dreamspos.dreamguystech.com/laravel/template/public/assets/img/icons/delete.svg" alt="svg"></a>
            </td>
        </tr>';
        return $html_data;
    }
    public function stockGenerate($purchase){
        return 'hello';
    }
}
