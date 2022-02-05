<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form id="myform" method="POST" class="frmAjax form-vertical" action="http://127.0.0.1:8000/api/v1/auth/login" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="text" class="form-control" id="password" name="password" aria-describedby="emailHelp" />
        </div>

        <button type="submit" class="btn btn-primary">
            <span>ثبت</span>
        </button>
    </form>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $("form#myform").submit(function(e) {
            e.preventDefault();


            // console.log(getCookie('alw'))

            // function getCookie(cname) {
            //     let name = cname + "=";
            //     let decodedCookie = decodeURIComponent(document.cookie);
            //     let ca = decodedCookie.split(';');
            //     for (let i = 0; i < ca.length; i++) {
            //         let c = ca[i];
            //         while (c.charAt(0) == ' ') {
            //             c = c.substring(1);
            //         }
            //         if (c.indexOf(name) == 0) {
            //             return c.substring(name.length, c.length);
            //         }
            //     }
            //     return "";
            // }


            var formdata = new FormData(this);
            $.ajax({
                url: "http://127.0.0.1:8000/login",
                data: formdata,
                processData: false,
                contentType: false,
                type: "post",
                success: function(data, textStatus, xhr) {
                    function setCookie(cname, cvalue, exdays) {
                        const d = new Date();
                        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                        let expires = "expires=" + d.toUTCString();
                        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/admin";
                    }
                    setCookie('token', data.access_token, 1)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown)
                }
            });
        });
    </script>
</body>

</html>