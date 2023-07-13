@extends('mails.auth.layout')
    <!-- END HEADER/BANNER -->
    <!-- START 3 BOX SHOWCASE -->
    @section('content')
        <tr>
            <td align="center">
                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                    <tbody><tr>
                        <td height="35"></td>
                    </tr>

                    <tr>
                        <td align="center" style="font-family: 'Tajawal', sans-serif; font-size:22px; font-weight: bold; color:#2a3a4b;">
                            به وب سایت ما خوش آمدید      {{$user->username}} </td>
                    </tr>

                    <tr>
                        <td height="10"></td>
                    </tr>


                    <tr>
                        <td align="center" style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                            برای دسترسی سریع میتوانید از لینک های زیر استفاده کنید<br>

                        </td>
                    </tr>

                    </tbody></table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; ">
                    <tbody><tr>
                        <td height="10"></td>
                    </tr>
                    <tr>
                        <td>


                            <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

                                            <tbody>

                                            <tr align="center" style="line-height:0px;">

                                                <td>
                                                    <a href="{{route('profile')}}">
                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-about.png" width="69" height="78" alt="icon">
                                                    </a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="15"></td>
                                            </tr>


                                            <tr align="center">



                                                <td style="font-family: 'Raleway', Arial, sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">
                                                    <a href="{{route('profile')}}" style="color: #2b3c4d ; text-decoration: none"> پنل کاربری</a>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="10"></td>
                                            </tr>


                                            <tr align="center">
                                                <td style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">Place some cool text here.</td>
                                            </tr>

                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                </tr>
                                </tbody></table>





                            <table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
                                <tbody><tr>
                                    <td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                        <p style="padding-left: 24px;">&nbsp;</p>
                                    </td>
                                </tr>
                                </tbody></table>



                            <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

                                            <tbody><tr align="center" style="line-height:0px;">
                                                <td>
                                                    <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-team.png" width="69" height="78" alt="icon">
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="15"></td>
                                            </tr>


                                            <tr align="center">
                                                <td style="font-family: 'Tajawal', sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">Our Team</td>
                                            </tr>


                                            <tr>
                                                <td height="10"></td>
                                            </tr>


                                            <tr align="center">
                                                <td style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">Place some cool text here.</td>
                                            </tr>



                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                </tr>
                                </tbody></table>



                            <table width="1" height="20" border="0" cellpadding="0" cellspacing="0" align="left">
                                <tbody><tr>
                                    <td height="20" style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                        <p style="padding-left: 24px;">&nbsp;</p>
                                    </td>
                                </tr>
                                </tbody></table>



                            <table class="col3" width="183" border="0" align="right" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td height="30"></td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table class="insider" width="133" border="0" align="center" cellpadding="0" cellspacing="0">

                                            <tbody><tr align="center" style="line-height:0px;">
                                                <td>
                                                    <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="https://designmodo.com/demo/emailtemplate/images/icon-portfolio.png" width="69" height="78" alt="icon">
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="15"></td>
                                            </tr>


                                            <tr align="center">
                                                <td style="font-family: 'Raleway',  sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">Our Portfolio</td>
                                            </tr>


                                            <tr>
                                                <td height="10"></td>
                                            </tr>


                                            <tr align="center">
                                                <td style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">Place some cool text here.</td>
                                            </tr>

                                            </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                </tr>
                                </tbody></table>


                        </td>
                    </tr>
                    </tbody></table>
            </td>
        </tr>
        <tr>
            <td height="5"></td>
        </tr>
    @endsection


