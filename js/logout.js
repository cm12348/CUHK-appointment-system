function logout() {
    $.ajax({
        type: "post",
        url: "check_login.php",
        data: {
            "logout": "1"
        },
        dataType: "json", // 因为PHP返回数据是JSON格式，所以这里类似要用JSON
        async: true,
        success: function (data) {
            login_state = data.login_state;
            login_username = data.username;
            login_userid = data.userid;
            console.log(login_state, login_username, login_userid);
            console.log("log out");
            if (login_state == 1) {
                document.getElementById("logtip").textContent = "(logged in)";
            } else {
                document.getElementById("logtip").textContent = "(log in first)";
            }
            window.location.reload();
        },
        error: function () {
            alert("请求失败！")
            return false;
        }
    });
}