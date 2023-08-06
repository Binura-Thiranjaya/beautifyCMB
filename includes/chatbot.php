<style>
* {
    --primaryGradient: linear-gradient(93.12deg, #581B98 0.52%, #9C1DE7 100%);
    --secondaryGradient: linear-gradient(268.91deg, #581B98 -2.14%, #9C1DE7 99.69%);
    --primaryBoxShadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    --secondaryBoxShadow: 0px -10px 15px rgba(0, 0, 0, 0.1);
    --primary: #581B98;
}
/* CHATBOX
=============== */
.chatbox {
  bottom: 8px;
  right: 16px;
  z-index: 100px!important;

}




/* CONTENT IS CLOSE */



.chatbox__support{
  display: flex;
  flex-direction: column;
  background: #eee;
  width: 300px;
  height: 350px;
  
  opacity: 5;
  transition: all .5s ease-in-out;
  
}
/* CONTENT ISOPEN */
.chatbox--active {
  transform: translateY(-20px);
  z-index: 123456;
  opacity: 1;

}

/* BUTTON */
.chatbox__button {
  text-align: right;
}

.send__button {
  padding: 6px;
  background: transparent;
  border: none;
  outline: none;
  cursor: pointer;
    }


    /* HEADER */
    .chatbox__header {
    position: sticky;
    top: 0;
    background: orange;
    }

    /* MESSAGES */
    .chatbox__messages {
    margin-top: auto;
    display: flex;
    overflow-y: scroll;
    flex-direction: column-reverse;
    }

    .messages__item {
    background: orange;
    max-width: 60.6%;
    width: fit-content;
    }

    .messages__item__operator {
    margin-left: auto;
    }

    .messages__item--visitor {
    margin-right: auto;
    }

    /* FOOTER */
    

    .chatbox__support {
    background: #f9f9f9;
    height: 450px;
    width: 350px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;

    border-end-start-radius: 20px;
    border-end-end-radius: 20px;
    margin-bottom: 10px;
    }

    /* HEADER */
    .chatbox__header {
    background: var(--primaryGradient);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0px 0px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    box-shadow: var(--primaryBoxShadow);
    }

    .chatbox__image--header {
    margin-right: 10px;
    }

    .chatbox__heading--header {
    font-size: 1.2rem;
    color: white;
    }

    .chatbox__description--header {
    font-size: .9rem;
    color: white;
    }

    /* Messages */
    .chatbox__messages {
    padding: 0 20px;
    }

    .messages__item {
    margin-top: 10px;
    background: #E0E0E0;
    padding: 8px 12px;
    max-width: 70%;
    }

    .messages__item--visitor,
    .messages__item--typing {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    }

    .messages__item__operator {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    background: var(--primaryChatbot);
    color: white;
    }

    /* FOOTER */
    .chatbox__footer {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 20px 20px;
    background: var(--secondaryGradient);
    box-shadow: var(--secondaryBoxShadow);
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-top: 20px;
    }

    /* .chatbox__footer input {
    width: 80%;
    border: none;
    padding: 10px 10px;
    border-radius: 30px;
    text-align: left;
    z-index: 20px;
    
    } */


    #msg:hover
    {
        
        background-color: #9C1DE7;
    }

    .chatbox__send--footer {
    color: white;
    }

    .chatbox__button button,
    .chatbox__button button:focus,
    .chatbox__button button:visited {
    padding: 10px;
    background: white;
    border: none;
    outline: none;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    }
    .user_msg{
        padding: 10px;
        background: white;
        border: none;
        outline: none;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-left-radius: 50px;
        box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }
    </style>
    <!--End Style-->
    <div style="position: relative;" >
        <div class="chatbox " style="position: fixed;"   > 
            <div class="chatbox__support collapse" id="collapseChat">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="https://img.icons8.com/color/48/000000/circled-user-female-skin-type-5--v1.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support</h4>
                        <p class="chatbox__description--header">Hi. I am an agent from BeautifyCMB. How can I help you?</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div></div>
                </div>
                <div class="chatbox__footer">
                    <input type="text" class="p-2 bg-white w-75 rounded-pill form-control" placeholder="Write a message..." onkeyup="handleEnter()" id="msg" autofocus>
                    
                    <button class="chatbox__send--footer send__button" onclick="sendMessage()">Send</button>
                </div>
            </div>
            <div class="chatbox__button" >
            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseChat" aria-expanded="false" aria-controls="collapseChat" ><img src="assets/images/chatbot/chatbox-icon.svg" /></button>
            </div>
        </div>
    </div>
    <!--Script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function toggleChatbox(){

            if($('.chatbox__support').css('visibility') == 'hidden'){
                $('.chatbox__support').css('visibility','visible');
                $('.chatbox__support').addClass('chatbox--active');

            }else{
                $('.chatbox__support').css('visibility','hidden');
                $('.chatbox__support').removeClass('chatbox--active');
            }
        }
        function handleEnter(){
            if(event.keyCode == 13){
                sendMessage();
            }
        }
        // function sendMessage(){
        //     var message = $('.chatbox__footer input').val();
        //     if(message == ''){
        //          $('.chatbox__messages').append('<div class="messages__item messages__item__operator">No Message...</div>');
                
        //     }

        //    
        // }
        var messages = [];
        function sendMessage() {
        var textField =  document.getElementById("msg").value;
        let text1 = textField;
        if (text1 === "") {
                $('.chatbox__messages').append('<div class="messages__item messages__item--visitor">No Message...</div>');

        }else{
        let msg1 = { name: "User", message: text1 }
        messages.push(msg1);

        const CHATBOT_API = "http://127.0.0.1:5000";
        const API = CHATBOT_API+"/predict";
        fetch(API, {
            method: 'POST',
            body: JSON.stringify({ message: text1 }),
            mode: 'cors',
            headers: {
            'Content-Type': 'application/json'
            },
        })
        .then(r => r.json())
        .then(r => {
            let msg2 = { name: "System", message: r.answer };
            messages.push(msg2);
            updateChatText()
            document.getElementById("msg").value = "";
        }).catch(err => {
            console.log(err);
        }
        )
        }
    }
        function updateChatText() {
            let chatText = "";
            //revice
                messages.slice().reverse().forEach(function(item, index) {
                if (item.name === "System")
                {
                    chatText += '<div class="messages__item messages__item--visitor" >' + item.message + '</div>'

                }
                else
                {
                    chatText += '<div class="messages__item user_msg" style="margin-left: auto;color: red;">' + item.message + '</div>'

                }
            });
        
            $('.chatbox__messages').html(chatText);
            
    }

        


    </script>
    <!--End Script-->

    

