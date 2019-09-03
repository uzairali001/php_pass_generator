$(function () {
    let $form = $("#pass-generate-form");
    let $passInput = $("#plain-password");
    let $encPassText = $("#encryptedpass-text");


    initializeToast(".main-container");


    $form.on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: "post",
            url: $form.attr("action"),
            data: {"plain_pass": $passInput.val()},
            dataType: "JSON",
            success: function (response) {
                if(response && response.hash)
                {
                    $encPassText.removeClass('muted-invert')
                                .text(response.hash)
                                .data("generated", "true")
                                .parent()
                                .addClass("generated");

                    copyToClipboard(response.hash);
                    showToastMessage("Copied to clipboard");
                }
            }
        });
        

    });






});


function initializeToast(selector = "")
{
    if($("#toast-message-container").length > 0){
        return;
    }    

    let css =
    `<style>
        #toast-message-container{
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;          
        }
        #toast-message-container .toast-message-text-container{
            position: absolute;
            background: rgba(0, 0, 0, .5);
            color: white;
            bottom: 0px;
            padding: 10px 15px;
            border-radius: 5px;
        }
        #toast-message-container .toast-message-text-container.toast-slide-up{
            animation: toast-slide-up .5s ease forwards;
        }
        #toast-message-container .toast-message-text-container.toast-slide-down{
            animation: toast-slide-down .5s ease forwards;
        }

        @keyframes toast-slide-up {
            0% {
                opacity: 0;
                transform: translateY(100%);
            }
            100% {
                opacity: 1;
                transform: translateY(-200%);
            }
        }

        @keyframes toast-slide-down {
            0% {
                opacity: 1;
                transform: translateY(-200%);
            }
            100% {
                opacity: 0;
                transform: translateY(100%);
            }
        }
    </style>`;

    let html = 
    `<div id="toast-message-container">   
    </div>`;

    $("head").append(css);

    let appendTo = empty(selector) ? "body" : selector;
    $(appendTo).append(html);
}

function showToastMessage(message, timeout = 3)
{
    if(empty(message)){
        return;
    }
    let toast = $(`<div class="toast-message-text-container toast-slide-up"><p class="toast-message-text">${message}</p></div>`);
    
    $("#toast-message-container").append(toast);

    setTimeout(() => {
        toast.removeClass("toast-slide-up")
             .addClass("toast-slide-down").delay(1000).remove();
    }, timeout* 1000);
}


function copyToClipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}


function empty(n){
	return !(!!n ? typeof n === 'object' ? Array.isArray(n) ? !!n.length : !!Object.keys(n).length : true : false);
}