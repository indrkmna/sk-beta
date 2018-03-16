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

                <div align="center"><h3>Login ke <?php echo $site['nameweb'];?></h3></div><br>
                <div class="register-form" style="background: #ffffff; padding:20px 20px 20px 20px; border-radius: 6px;">
                    <?php
                    // Session 
                    if($this->session->flashdata('sukses')) { 
                        echo '<div class="notification error closeable">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    } 
                    // Error
                        echo validation_errors('<div class="notification error closeable">','</div>'); 
                    ?>
                        <form method="post" action="<?php echo base_url('login');?>" class="login">
                            <p class="form-row form-row-wide">
                                <label for="username">Username:
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" name="username" id="username" value="" />
                                </label>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password" />
                                </label>
                                <div class="container" style="width: 100%;">
                                    <div class="left-side">
                                        <span class="lost_password">
                                            <a href="#" style="font-size: 12px">Lupa Password?</a>
                                        </span>
                                    </div>
                                    <div class="right-side">
                                        <span class="lost_password">
                                            <a href="<?php echo base_url('register');?>" style="font-size: 12px">Belum memiliki akun?</a>
                                        </span>
                                    </div>              
                                </div>
                            </p>
                            <div class="form-row">
                                <input type="submit" class="button border margin-top-5" name="login" value="Login" style="width:100%; border-radius: 6px;" />
                               <!-- <a href="#" class="button margin-top-5" style="width:100%; border-radius: 6px; background: blue;" /><div align="center"> <i class="fa fa-facebook"></i> Login dengan Facebook </div></a> -->
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>