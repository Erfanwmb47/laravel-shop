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

                     <span>{{$user->username}}</span>
                        تغییر رمز عبور کاربر
                    </td>
                </tr>

                <tr>
                    <td height="10"></td>
                </tr>


                <tr>
                    <td align="center" style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                        شما درخواست فراموشی رمز عبور داده اید<br>

                    </td>
                </tr>

                </tbody></table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                    <td align="center" bgcolor="#2a3b4c">
                        <table class="col-600" width="600" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tbody><tr>
                                <td height="33"></td>
                            </tr>
                            <tr>
                                <td>


                                    <table class="col1" width="183" border="0" align="left" cellpadding="0" cellspacing="0">

                                        <tbody><tr>
                                            <td height="18"></td>
                                        </tr>

                                        <tr>
                                            <td align="center">
                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;" class="images_style" src="https://designmodo.com/demo/emailtemplate/images/icon-title.png" alt="img" width="156" height="136">
                                            </td>



                                        </tr>
                                        </tbody></table>



                                    <table class="col3_one" width="380" border="0" align="right" cellpadding="0" cellspacing="0">

                                        <tbody><tr align="left" valign="top">
                                            <td style="font-family: 'Tajawal', sans-serif; font-size:20px; color:#f1c40f; line-height:30px; font-weight: bold;">این پیام تا {{$expire_time}} دقیقه دیگر اعتبار دارد </td>
                                        </tr>


                                        <tr>
                                            <td height="5"></td>
                                        </tr>


                                        <tr align="left" valign="top">
                                            <td style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300;">
                                                درخواست شما ایجاد شد . برای تغییر رمز عبور خود روی لینک زیر کلیلک نمایید . چنانچه این درخواست از جانب شما نیست این پیام را نادیده بگیرید
                                            </td>
                                        </tr>

                                        <tr>
                                            <td height="10"></td>
                                        </tr>

                                        <tr align="left" valign="top">
                                            <td>
                                                <table class="button" style="border: 2px solid #fff;" bgcolor="#2b3c4d" width="30%" border="0" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td width="10"></td>
                                                        <td height="30" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ffffff;">
                                                            <a href="{{$url}}" style="color:#ffffff; text-decoration: none;">تغییر رمز عبور</a>
                                                        </td>
                                                        <td width="10"></td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>

                                        </tbody></table>
                                </td>
                            </tr>
                            <tr>
                                <td height="33"></td>
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

