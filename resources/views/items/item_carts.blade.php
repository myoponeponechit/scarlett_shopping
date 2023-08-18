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
        $(document).ready(function(){

            getData();
            count();

            function getData(){
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
                                <td><button class="min btn btn-danger btn-sm" data-index="${i}"><strong> - </strong></button><input type="text" value="${v.qty}" readonly style="width:50px;height:30px;border-radius:5px;margin:5px;border:1px solid gray;outline:none;text-align:center;"><button class="max btn btn-success btn-sm" data-index="${i}"><strong> + </strong></button></td>
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
            }

            $('#cartTbody').on('click', '.min', function(){
                let index = $(this).data('index');
                //console.log(index);

                let itemString = localStorage.getItem('scarlettShop_items');
                if(itemString){
                    let itemArray = JSON.parse(itemString);

                    $.each(itemArray, function(i, v){
                        if(index == i){
                            v.qty--;
                            if(v.qty == 0){
                                itemArray.splice(index, 1);
                            }
                            
                        }
                    })

                    let itemData = JSON.stringify(itemArray);
                    localStorage.setItem('scarlettShop_items', itemData);

                    getData();
                    count();
                }
            })

            $('#cartTbody').on('click','.max', function(){
                //alert('ok');
                let index = $(this).data('index');
                //console.log(index);

                let itemString = localStorage.getItem('scarlettShop_items');
                if(itemString){
                    let itemArray = JSON.parse(itemString);

                    $.each(itemArray, function(i, v){
                        if(index == i){
                            v.qty++;
                        }
                    })

                    let itemData = JSON.stringify(itemArray);
                    localStorage.setItem('scarlettShop_items', itemData);
                    getData();
                    count();
                }
            })
        })
    
    </script>
@endsection