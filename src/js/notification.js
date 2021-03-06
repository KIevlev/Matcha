(() => {
    const SECURE = false;
    const PORT = 9001;

    const domain = window.document.domain;
    const scheme = SECURE ? 'wss' : 'ws';

    const conn = new WebSocket(`${scheme}://${domain}:${PORT}/`);
    conn.onopen = function (e) {
        console.log("Connection established!");
    };

    conn.onmessage = function (e) {
        console.log(e.data);
    };
})();

/*

let domain = window.document.domain;
let get = window
    .location
    .search
    .replace('?', '')
    .split('&')
    .reduce(
        function (p, e) {
            let a = e.split('=');
            //p[decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
            return a;
        }, {});
//if (document.cookie.split('=', 2)[1] !== null){
let cookie = document.cookie.split('=', 2)[1];
//}
let address = window.location.pathname;
let socket = new WebSocket("wss://" + domain + ":9001");//+"/conversation/chat_view/"); //+":6969"
let messageJSON = {};
socket.onopen = function () {
    if (get[0] === "login" && address === "/profile/view/" && get[1] !== "") {
        messageJSON = {
            user_from: cookie,
            user_to: get[1],
            message: 'New visit :',
            type: 1
        };
        socket.send(JSON.stringify(messageJSON));
    }
    if (get[0] === "id" && address === "/conversation/chat_view/" && get[1] !== "") {
        messageJSON = {
            user_from: cookie,
            user_to: get[1],
            message: '',
            type: 19
        };
        socket.send(JSON.stringify(messageJSON));
    }
};

socket.onerror = function (error) {
};

socket.onmessage = function (event) {
    let data = JSON.parse(event.data);
    if (data.type === 13 && get[1] !== data.chat_id) {
        for (let user in data.user_to) {
            if (data.user_to[user]['session_name'] === cookie) {
                appendNotifications("New message from <a href='/conversation/chat_view/?id=" + data.chat_id + "'>" +
                    data.user_from + "</a>\nmassage: " +
                    data.message);
                appendCountNewMessage();
            }
        }
    }
    if (data.type === 2 || data.type === 3 || data.type === 1 || data.type === 4)
        for (let user in data.user_to)
            if (data.user_to[user]['session_name'] === cookie) {
                appendNotifications(data.message + " <a href='/profile/view/?login=" + data.user_from + "'>" + data.user_from + "</a>");
                appendCountNotifications();
            }
};

function appendNotifications(data) {
    let notificationBlock = document.getElementById("notification_block");
    div = document.createElement("div");
    div.setAttribute("id", "notif_content");
    div.innerHTML = data;
    notificationBlock.append(div);
    notificationBlock.style.visibility = "visible";
}

function closeNotifications() {
    $("#notif_content").remove();
    let notificationBlock = document.getElementById("notification_block");
    notificationBlock.style.visibility = "hidden";
}

function appendCountNewMessage() {
    let countMessage = document.getElementById("notification_mess");
    if (countMessage)
        countMessage.innerText = Number(countMessage.innerText) + 1;
    else {
        let conversation_icon = document.getElementById('conversation_icon');
        let newMessage = document.createElement("span");
        newMessage.setAttribute("id", 'notification_mess')
        newMessage.innerText = "1";
        conversation_icon.appendChild(newMessage);
    }
}

function appendCountNotifications() {
    let countNotification = document.getElementById("notification_count");
    if (countNotification)
        countNotification.innerText = Number(countNotification.innerText) + 1;
    else {
        let notification_icon = document.getElementById('notification');
        let newNotification = document.createElement("span");
        newNotification.setAttribute("id", 'notification_count')
        newNotification.innerText = "1";
        notification_icon.appendChild(newNotification);
    }
}


window.addEventListener('beforeunload', function (e) {
    socket.close();
});

*/
