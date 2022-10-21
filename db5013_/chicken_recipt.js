var sell_price;  //후라이드
var amount;

var sell_price1; //양념
var amount1;



function init () {
	sell_price = document.form.sell_price.value;
	amount = document.form.amount.value;
	document.form.sum.value = sell_price;
	change();
	sell_price1 = document.form1.sell_price1.value;
	amount1 = document.form1.amount1.value;
	document.form1.sum1.value = sell_price1;
	change1();
	
}

function add () {
	hm = document.form.amount;
	sum = document.form.sum;
	hm.value ++ ;

	sum.value = parseInt(hm.value) * sell_price;
}

function del () {
	hm = document.form.amount;
	sum = document.form.sum;
		if (hm.value > 1) {
			hm.value -- ;
			sum.value = parseInt(hm.value) * sell_price;
		}
}

function change () {
	hm = document.form.amount;
	sum = document.form.sum;

		if (hm.value < 0) {
			hm.value = 0;
		}
	sum.value = parseInt(hm.value) * sell_price;
}  
//-----------------------------------------------1
function add1 () {
	hm1 = document.form1.amount1;
	sum1 = document.form1.sum1;
	hm1.value ++ ;

	sum1.value = parseInt(hm1.value) * sell_price1;
}

function del1 () {
	hm1 = document.form1.amount1;
	sum1 = document.form1.sum1;
		if (hm1.value > 1) {
			hm1.value -- ;
			sum1.value = parseInt(hm1.value) * sell_price1;
		}
}

function change1 () {
	hm1 = document.form1.amount1;
	sum1 = document.form1.sum1;

		if (hm1.value < 0) {
			hm1.value = 0;
		}
	sum1.value = parseInt(hm1.value) * sell_price1;
}  
