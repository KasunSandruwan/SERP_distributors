/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function isAlphabetcarts(evt) {

    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
//   alert(charCode);

    if ((charCode > 31 && charCode < 33) || (charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)) {
        return true;
    }
    return false;

}

function numberlenth(val, evt) {

    if (val.length > 0) {

        // document.getElementById('wrapper').style.visibility = "hidden";

        var v = document.getElementById('cnuber').value;
        var number;

        number = v.substring(0, 2);

        if (number.substring(0, 1) == 4) {

            number = 4 * 1;

        } else {

            number = v.substring(0, 2) * 1;

        }



        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;

        if (charCode == 127 || charCode == 8) {
            // document.getElementById('nuberchek').style.visibility = "hidden";
            // document.getElementById('notvalue').value = "";

            if (v.length < 2) {
                // document.getElementById('close').style.visibility = "hidden";
            } else {
                // document.getElementById('close').style.visibility = "visible";
            }



        } else {

            switch (number) {

                case 4:

                    // alert("VSA cart");

                    document.getElementById("cardtype").value="VSA";
                    document.getElementById('master').setAttribute("class", "cartdisable");
                    document.getElementById('american').setAttribute("class", "cartdisable");
                    document.getElementById('discover').setAttribute("class", "cartdisable");
                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {
                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 9) {
                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {
                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }


                    break;
                case 40:


                    //  alert("VSA cart");
                    document.getElementById("cardtype").value="VSA";
                    document.getElementById('master').setAttribute("class", "cartdisable");
                    document.getElementById('american').setAttribute("class", "cartdisable");
                    document.getElementById('discover').setAttribute("class", "cartdisable");
                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 9) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }




                    break;
                case 51 :

                    // alert("Mastercard (prepaid)");

                    document.getElementById("cardtype").value="Mastercard (prepaid)";
                    document.getElementById('visa').setAttribute("class", "cartdisable");
                    document.getElementById('american').setAttribute("class", "cartdisable");
                    document.getElementById('discover').setAttribute("class", "cartdisable");
                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 9) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }


                    break;
                case 52 :

                    //alert("Mastercard (debit)");
                    document.getElementById("cardtype").value="Mastercard (debit)";
                    document.getElementById('visa').setAttribute("class", "cartdisable");

                    document.getElementById('american').setAttribute("class", "cartdisable");
                    document.getElementById('discover').setAttribute("class", "cartdisable");
                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 9) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }

                    break;
                case 55 :

                    // alert("Mastercard");

                     document.getElementById("cardtype").value="Mastercard";
                    document.getElementById('visa').setAttribute("class", "cartdisable");
                    document.getElementById('american').setAttribute("class", "cartdisable");
                    document.getElementById('discover').setAttribute("class", "cartdisable");
                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 9) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }
                    break;
                case 37:
                    // alert("American Express");

                     document.getElementById("cardtype").value="American Express";
                    document.getElementById('cnuber').setAttribute("maxlength", "17");
                    document.getElementById('visa').setAttribute("class", "cartdisable");
                    document.getElementById('master').setAttribute("class", "cartdisable");

                    document.getElementById('discover').setAttribute("class", "cartdisable");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 11) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 17) {

                        document.getElementById('cnuber').value = val;
                    }
                    if (v.length == 16) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }


                    break;

                case 60:

                    //alert("Discover");

                     document.getElementById("cardtype").value="Discover";
                    document.getElementById('visa').setAttribute("class", "cartdisable");
                    document.getElementById('master').setAttribute("class", "cartdisable");
                    document.getElementById('american').setAttribute("class", "cartdisable");

                    document.getElementById('cnuber').setAttribute("maxlength", "19");


                    if (v.length == 4) {

                        document.getElementById('cnuber').value = val + "-";

                    }
                    if (v.length == 9) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 14) {

                        document.getElementById('cnuber').value = val + "-";
                    }
                    if (v.length == 18) {

                        // document.getElementById('close').style.visibility = "hidden";
                        // document.getElementById('nuberchek').style.visibility = "visible";
                    }
                    break;

                default :

                    document.getElementById('cnuber').setAttribute("maxlength", "19");
                    document.getElementById('close').style.visibility = "visible";
                    document.getElementById('notvalue').value = 1;
//                        alert("not is value cart");
                    break;

            }
        }


        if (val.length < 2) {
            // document.getElementById('wrapper').style.visibility = "visible";
            document.getElementById('visa').removeAttribute("class");
            document.getElementById('master').removeAttribute("class");
            document.getElementById('discover').removeAttribute("class");
            document.getElementById('american').removeAttribute("class");
        }

    } else {

        // document.getElementById('nuberchek').style.visibility = "hidden";
        // document.getElementById('wrapper').style.visibility = "visible";
        document.getElementById('visa').removeAttribute("class");
        document.getElementById('master').removeAttribute("class");
        document.getElementById('discover').removeAttribute("class");
        document.getElementById('american').removeAttribute("class");
    }

}
function cvc(val) {

    if (val.length > 0) {

        // document.getElementById('helpmyPopup').classList.remove('show');
        // document.getElementById('carthelp').style.visibility = "hidden";


        if (val.length > 2 && val.length < 5) {

            // document.getElementById('cvcnuberchek').style.visibility = "visible";
            // document.getElementById('cvcclose').style.visibility = "hidden";
            document.getElementById('notvalue').value = "";
            //alert("CVC code valu @@@@@");

        } else {


            // document.getElementById('cvcclose').style.visibility = "visible";
            // document.getElementById('cvcnuberchek').style.visibility = "hidden";
            document.getElementById('notvalue').value = 1;
//            alert("CVC code not valu");
        }




    } else {
        // document.getElementById('carthelp').style.visibility = "visible";
        // document.getElementById('cvcclose').style.visibility = "hidden";


    }


}
function cartmonth(val) {

    card_exp();

    if (val > 12) {

        document.getElementById('cartmon').value = 12;

    }
    if (val.length < 2) {

        document.getElementById('Expired').style.visibility = "hidden";

    }


}
function card_exp() {

    var currentMonth, currentYear;
    var month = document.getElementById("cartmon").value;
    var year = document.getElementById("cardyear").value;

    if (year != null || !year.equals("")) {

        currentMonth = new Date().getMonth() + 1;
        currentYear = new Date().getFullYear().toString().substr(2, 2);


        if (year < currentYear || (year == currentYear && month < currentMonth)) {

            document.getElementById('Expired').style.visibility = "visible";
        } else {
            document.getElementById('Expired').style.visibility = "hidden";
        }

    }

}
function checkmonth() {

    var month = document.getElementById('cartmon').value;


    if (month < 10) {

        if (month.length != 2) {
            document.getElementById('cartmon').value = "0" + month;
        }



    }

}