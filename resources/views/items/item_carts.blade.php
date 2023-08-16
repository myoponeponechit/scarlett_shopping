@extends('layouts.front-end')
@section('content')
    <div class="container my-5">
        <h3 class="text-center py-5">My Shopping Carts</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Item Discount</th>
                        <th>Item Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="cartTbody">
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let itemString = localStorage.getItem('scarlettShop_items');
        if(itemString){
            let itemArray = JSON.parse(itemString);
            let data = '';
            let total = 0;
            $.each(itemArray, function(i,v){
                let amount = v.price - ((v.discount/100)*v.price);
                var formatted = amount.toFixed(2);
                data += `<tr class="text-center">
                        <td style="width: 400px;"><img src="${v.image}" class="img-fluid w-25 h-25"></td>
                        <td>${v.name}</td>
                        <td>${v.price} MMK</td>
                        <td>${v.discount}%</td>
                        <td>${v.qty}</td>
                        <td>${v.qty * formatted} MMK</td>
                    </tr>`;
                    total += Number(v.qty * formatted);
            })
            data += `<tr>
                    <td colspan="5" class="text-center">Total</td>
                    <td>${total.toFixed(2)} MMK</td>
                </tr>`;
            $('#cartTbody').html(data);
        }
    
    </script>
@endsection