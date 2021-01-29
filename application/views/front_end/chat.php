
<script>
    var myVar;
    var myVar1;
    function send_message()
    {
        message = $("#message").val();
        if (message != "")
        {

            $("#send").prop('disabled', true);

            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "index.php/welcome/send_message_chat",
                datatype: "text",
                data: {message: message},
                success: function (response)
                {
                    update_chat();
                    $("#message").val("");
                    $("#message").focus();
                },
                error: function (xhr, ajaxOptions, thrownError) {}
            });
            $("#send").prop('disabled', false);
        } else
        {
            alert("Enter Message");
        }
    }
    function update_chat()
    {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/update_chat",
            datatype: "text",
            data: {},
            success: function (response)
            {
                $("#message_list").empty();
                $("#message_list").append(response);
            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }
    function delete_old_msg()
    {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "index.php/welcome/delete_old_msg",
            datatype: "text",
            data: {},
            success: function (response)
            {

            },
            error: function (xhr, ajaxOptions, thrownError) {}
        });
    }
    $(document).ready(function ()
    {
        myVar = setInterval("update_chat()", 3000);
        myVar1 = setInterval("delete_old_msg()", 3000);
    });
    $(document).ready(function ()
    {
        update_chat();
    });

</script>
<style>
    #message_list
    {
        max-height: 500px;
        overflow-y: scroll;
    }
</style>
  
<section id="main-content">
    <div class="row">
        <div class="small-16 large-16 columns">
            <div class="notebook">
                <header>
                    <h2 class="title">Welcome &nbsp;<span style="color:#d6614f;">
                            <?php
                            if ($this->session->userdata('user_name')) {
                                echo $this->session->userdata('user_name');
                            }
                            ?>
                            <span>	
                                </h2>

                                </header>
                                <div class="blog-entries notebook-pattern" id="message_list">

                                </div>
                                <form>
                                    <label style="text-shadow:none;text-align:center;color:rgb(187, 213, 57);font-size: 20px;">Message
                                        <input type="text" id="message" placeholder="Type here.." aria-describedby="exampleHelpText" autocomplete="off" style="background: rgb(187, 213, 57);margin-top:1%;">
                                    </label>

                                    <center><a class="expanded lime-button" onclick="send_message();" id="send">Send</a>
                                        <span> (<a href="<?php echo site_url('welcome/chat_history'); ?>">Chat History</a>) </span></center>
                                </form>
                                </div>
                                </div>
                                </div>
                                
                                </section>
                                <br><center><iframe data-aa='873562' src='//ad.a-ads.com/873562?size=728x90' scrolling='no' style='width:728px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>
                                <center><iframe data-aa='873544' src='//ad.a-ads.com/873544?size=990x90' scrolling='no' style='width:990px; height:90px; border:0px; padding:0;overflow:hidden' allowtransparency='true'></iframe></center>