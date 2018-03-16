<section class="fullwidth padding-top-25 padding-bottom-70" data-background-color="#f8f8f8" style="background: rgb(248, 248, 248);">

    <div class="container">
        <div class="row">

            <style>
                .Absolute-Center {
                    margin: auto;
                }
                
                .Absolute-Center.is-Responsive {
                    width: 40%;
                    height: 50%;
                }
                .facebook{
                    background: yellow;
                }
                
                @media only screen and (max-width: 500px) {
                    .Absolute-Center.is-Responsive {
                        width: 100%;
                        height: 50%;
                    }
                }
            </style>
            <div class="Absolute-Center is-Responsive">

                <div align="center"><h3>Register <?php echo $site['nameweb'];?></h3></div><br>
                <div class="register-form" style="background: #ffffff; padding:20px 20px 10px 20px; border-radius: 6px;">
                    <?php
                    // Session 
                    if($this->session->flashdata('msg')) { 
                        echo '<div class="notification error closeable">';
                        echo $this->session->flashdata('msg');
                        echo '</div>';
                    } 
                    // Error
                        echo validation_errors('<div class="notification error closeable">','</div>'); 
                    ?>
                        <form method="post" action="<?php echo base_url('register');?>" class="register">
                            <p class="form-row form-row-wide">
                                <label for="username">Username:
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" name="username" id="username" value="" />
                                </label>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="username">Email:
                                    <i class="im im-icon-Mail"></i>
                                    <input type="email" class="input-text" name="email" id="email" value="" />
                                </                            
                            <p class="form-row form-row-wide">
                                <label for="password">Password:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password" />
                                </label>
                            </p>
                            <div class="form-row">
                                <input type="submit" class="button border margin-top-5" name="login" value="Register" style="width:100%; border-radius: 6px;" />
                            </div>
                                <span class="lost_password">                      
                                    <p style="line-height: 20px; font-size: 12px;">Dengan mengeklik "<b>Register</b>", Anda menyetujui persyaratan layanan dan <a href="<?php echo base_url('privacy');?>"> Kebijakan Privasi</a> kami. Kami sesekali akan mengirimkan email terkait akun Anda.</p>
                                </span>                            
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>