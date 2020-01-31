
let id = $("input[name*='book_id']")
id.attr("readonly","readonly");


$(".btnedit").click( e =>{
    let textvalues = displayData(e);

    ;
    let customername = $("input[name*='CustomerName']");
	let address = $("input[name*='Address']");
	let phonenumber = $("input[name*='Phone']");
    let productname = $("input[name*='ProductName']");
	let invoicenumber = $("input[name*='InvoiceNumber']");
    let totallprice = $("input[name*='TotallPrice']");
	let totallprice = $("input[name*='PaidTaka']");
	let totallprice = $("input[name*='PaidAmount']");

    id.val(textvalues[0]);
    customername.val(textvalues[1]);
	address.val(textvalues[2]);
	phonenumber.val(textvalues[3]);
	productname.val(textvalues[4]);
    //    author:zhjoy: bit.ly/zh_facebook
    invoicenumber.val(textvalues[5]);
    totallprice.val(textvalues[6].replace("$", ""));
	paidtaka.val(textvalues[7]);
	paidamount.val(textvalues[8]);

});


function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;

}