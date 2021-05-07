<html>
<head>
<title>Sticky Contact Form</title>
<style>
body {
    font-family: Arial;
    color: #212121;
}

.input-row {
    margin-bottom: 20px;
}

.input-row label {
    color: #75726c;
}

.input-field {
    width: 100%;
    border-radius: 2px;
    padding: 10px;
    border: #e0dfdf 1px solid;
    box-sizing: border-box;
    margin-top: 2px;
}

.btn-submit {
    padding: 10px 60px;
    background: #9e9a91;
    border: #8c8880 1px solid;
    color: #ffffff;
    font-size: 0.9em;
    border-radius: 2px;
    cursor: pointer;
}

.info {
    font-size: .8em;
    color: #e66262;
    letter-spacing: 2px;
    padding-left: 5px;
}

.demo-wrapper {
    justify-content: space-between;
    max-width: 900px;
    margin: 0 auto;
    height: 500px;
    overflow: auto;
    padding: 10px 20px;
}

.main-col {
    float: left;
    flex-direction: column;
    padding: 15px;
    background-color: #fff;
    width: 60%;
}

.contact-sidebar {
    position: sticky;
    top: 25px;
    border: #e2ddd2 1px solid;
    border-radius: 2px;
    padding: 15px;
    background-color: #fff;
    float: right;
    width: 30%;
}.successMessage {
    background-color: #9fd2a1;
    border: #91bf93 1px solid;
    padding: 5px 10px;
    color: #3d503d;
    border-radius: 3px;
    cursor: pointer;
    font-size: 0.9em;
}

</style>
</head>
<body>
    <div class="demo-wrapper">
        <div class="main-col">
            Vivamus commodo semper sapien eu tincidunt. Sed tincidunt
            semper dolor, nec semper ante euismod et. Nullam eu ante
            erat. Nam sed libero condimentum, suscipit odio non,
            molestie elit. Nam vitae consequat dolor, vitae iaculis
            nunc. Class aptent taciti sociosqu ad litora torquent per
            conubia nostra, per inceptos himenaeos. In nisl dolor,
            molestie et est vitae, ornare convallis leo. Aliquam
            venenatis libero velit, et tincidunt purus ultricies non.
            Vestibulum porttitor ut enim in cursus. Duis suscipit ac est
            in sodales. Sed eget nisl id erat viverra semper et sed
            diam. Phasellus ornare magna a enim blandit, id rhoncus mi
            porta. Nullam eget neque sit amet dui faucibus aliquet. Nunc
            dui lacus, tempus ac nisl in, dictum consequat purus. Donec
            quam ex, laoreet at semper eget, consequat et libero. In nec
            dolor diam.
            <p>Sed quam mauris, sodales sit amet dolor a, condimentum
                maximus lectus. Nam porta mollis vestibulum. Aliquam
                sagittis nibh vitae interdum efficitur. Maecenas nec
                turpis vel nulla tincidunt faucibus quis vel nunc.
                Maecenas eu metus magna. Sed ultricies eros dapibus eros
                lobortis mollis. Morbi eu ante eget sapien facilisis
                fringilla. Nunc quis neque ac lacus tincidunt tincidunt.
                Phasellus eu nunc quis nisi dictum auctor. Pellentesque
                at erat id ante hendrerit scelerisque. Maecenas cursus
                ligula eget tempus placerat. Morbi eu luctus lorem, eu
                interdum elit. Phasellus fringilla, augue non tincidunt
                molestie, dolor urna maximus leo, nec tristique sapien
                ante non lectus. Phasellus efficitur, sapien tempor
                varius malesuada, turpis metus sodales est, tempor
                pellentesque dui nunc eget felis. Vivamus consectetur
                ullamcorper lobortis.</p>
            <p>Praesent blandit commodo odio, id dignissim mi mollis a.
                Nunc non nisi eu dolor mollis semper. In vel sem quis
                sapien condimentum commodo vel id turpis. Etiam ut enim
                dignissim, consequat orci vel, bibendum dolor. Nulla
                dapibus nunc ac urna ultricies, non tempor lectus
                semper. Aenean eu velit pulvinar, accumsan diam in,
                ultricies nunc. Suspendisse ullamcorper euismod metus
                non lacinia. Mauris finibus hendrerit odio. Vestibulum
                sit amet nulla pretium, rutrum lacus in, porta nunc.</p>

        </div>


        <div class="contact-sidebar">
            <form name="frmContact" id="frmContact" method="post"
                action="" enctype="multipart/form-data"
                onsubmit="return validateContactForm()">

                <div class="input-row">
                    <label style="padding-top: 20px;">Name</label> <span
                        id="userName-info" class="info"></span><br /> <input
                        type="text" class="input-field" name="userName"
                        id="userName" />
                </div>
                <div class="input-row">
                    <label>Email</label> <span id="userEmail-info"
                        class="info"></span><br /> <input type="text"
                        class="input-field" name="userEmail"
                        id="userEmail" />
                </div>
                <div class="input-row">
                    <label>Subject</label> <span id="subject-info"
                        class="info"></span><br /> <input type="text"
                        class="input-field" name="subject" id="subject" />
                </div>
                <div class="input-row">
                    <label>Message</label> <span id="userMessage-info"
                        class="info"></span><br />
                    <textarea name="content" id="content"
                        class="input-field" cols="60" rows="3"></textarea>
                </div>
                <div>
                    <input type="submit" name="send" class="btn-submit"
                        value="Send" />

                    <div id="statusMessage"> 
                        <?php
                        if (! empty($message)) {
                            ?>
                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html("Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
</script>
</body>
</html>