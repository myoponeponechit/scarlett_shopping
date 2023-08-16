$(document).ready(function(){
    itemCount();
    $('.product_actions').on('click','.addToCart',function(){
       // alert('ok');
       let id = $(this).data('id');
       let name = $(this).data('name');
       let image = $(this).data('image');
       let price = $(this).data('price');
       let discount = $(this).data('discount');
       let qty = $('.qty').val();

       let items = {
        id:id,
        name:name,
        image:image,
        price:price,
        discount:discount,
        qty:qty
       };

       let itemString = localStorage.getItem('scarlettShop_items');
        let itemArray;
        if(itemString == null) {
            itemArray = [];
        }else {
            itemArray = JSON.parse(itemString);
        }

        let status = false;
        $.each(itemArray,function(i,v){
            if(id == v.id){
                status = true;
                v.qty = Number(v.qty) + Number(qty);
            }
        })

        if(status == false){
            itemArray.push(items);
        }

        //itemArray.push(items);
        let itemData = JSON.stringify(itemArray);
        localStorage.setItem('scarlettShop_items', itemData);
        itemCount();

    })

    function itemCount(){
        let itemString = localStorage.getItem('scarlettShop_items');
        if(itemString){
            let itemArray = JSON.parse(itemString);
            if(itemArray != 0){
                let count = itemArray.length;
                $('#itemCount').text(count);
            }
            else{
                $('#itemCount').text(0);
            }
        }
    }
})