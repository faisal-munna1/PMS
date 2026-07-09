class Cart {

    constructor(name = "cart") {

        this.name = name;

        if (!localStorage.getItem(this.name)) {

            this.saveData([]);

        }

    }



    // Get cart data
    getData() {

        try {

            return JSON.parse(
                localStorage.getItem(this.name)
            ) || [];

        } catch (error) {

            return [];

        }

    }



    // Save cart data
    saveData(data) {

        localStorage.setItem(
            this.name,
            JSON.stringify(data)
        );

    }




    // Add item
    addItem(item) {


        let cartItems = this.getData();



        let existItem = cartItems.find(
            product => product.id == item.id
        );



        if(existItem){

            existItem.qty += 1;

        }
        else{

            item.qty = item.qty ?? 1;

            cartItems.push(item);

        }



        this.saveData(cartItems);


        return cartItems;

    }






    // Delete item
    removeItem(itemId) {


        let cartItems = this.getData();



        cartItems = cartItems.filter(
            item => item.id != itemId
        );



        this.saveData(cartItems);


        return cartItems;

    }






    // Increase quantity
    increment(itemId) {


        let cartItems = this.getData();



        let item = cartItems.find(
            item => item.id == itemId
        );



        if(item){

            item.qty++;

        }



        this.saveData(cartItems);


        return cartItems;

    }







    // Decrease quantity
    decrement(itemId) {


        let cartItems = this.getData();



        let item = cartItems.find(
            item => item.id == itemId
        );



        if(item && item.qty > 1){

            item.qty--;

        }



        this.saveData(cartItems);


        return cartItems;

    }







    // Clear cart
    clear() {


        this.saveData([]);


        return [];

    }







    // Remove all local storage
    clearStorage(){

        localStorage.clear();

    }







    // Total quantity
    totalItems(){

        return this.getData()
        .reduce(
            (total,item)=> total + item.qty,
            0
        );

    }






    // Total price
    totalAmount(){


        return this.getData()
        .reduce(
            (total,item)=>
            total + (item.price * item.qty),
            0
        );

    }


}


