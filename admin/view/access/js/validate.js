function validate() {
	var name = document.getElementById('name').value;
	var product_code = document.getElementById('product_code').value;
	var image = document.getElementById('image').value;
	var price = document.getElementById('price').value;
	var typeAllow = /(\.jpg|\.jpeg|\.png|\.gif)/i;

	if(!product_code) {
		alert('Product_Code is empty!!');
	}
 	else if (name == '') {
		alert('Name is empty!!');
	}
	else if(image && !typeAllow.exec(image)){
		alert('Image is invalid!!');
	}
	else if (price == '') {
		alert('Price is empty!!');
	}
	else {
		return true;
	}
	return false;
}
