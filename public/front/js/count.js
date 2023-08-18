function count(){
    let itemString = localStorage.getItem('scarlettShop_items');
    if(itemString){
        let itemArray = JSON.parse(itemString);
        if(itemArray != 0){
            $('#itemCount').text(itemArray.length);
        }
        else{
            $('#itemCount').text('0');
        }
    }
}