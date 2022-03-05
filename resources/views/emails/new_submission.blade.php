<html>
<head></head>
<body>
<div style="padding:0;margin:0 auto;width:100%!important;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif">
    <div style="overflow:hidden;color:transparent;width:0;font-size:0;opacity:0;height:0"></div>
    <table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#EDF0F3"
           style="background-color:#edf0f3;table-layout:fixed">
        <tbody>
        <tr>
            <td align="center">
                <center style="width:100%">
                    <table role="presentation" border="0" class="m_3114960840336318424phoenix-email-container"
                           cellspacing="0" cellpadding="0" width="512" bgcolor="#FFFFFF"
                           style="background-color:#ffffff;margin:0 auto;max-width:512px;width:inherit">
                        <tbody>
                        <tr>
                            <td>
                                <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table role="presentation" border="0" cellspacing="0" cellpadding="0"
                                                   style="font-family:Helvetica,Arial,sans-serif" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td style="padding:16px 16px 24px 24px">
                                                        <table role="presentation" border="0" cellspacing="0"
                                                               cellpadding="0"
                                                               style="font-family:Helvetica,Arial,sans-serif"
                                                               width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <p style="margin:0;color:#4c4c4c;font-weight:400;font-size:16px;line-height:1.25">
                                                                        {{$intro}}
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:0 24px 24px 24px">
                                                        <table role="presentation" border="0" cellspacing="0"
                                                               cellpadding="0"
                                                               style="font-family:Helvetica,Arial,sans-serif"
                                                               width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td width="60"
                                                                    style="display:inline-block;width:60px;padding-right:12px">
                                                                    <table role="presentation" border="0"
                                                                           cellspacing="0" cellpadding="0"
                                                                           style="font-family:Helvetica,Arial,sans-serif"
                                                                           width="100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td valign="top"
                                                                    style="display:inline-block;width:initial;vertical-align:top">
                                                                    <table role="presentation" border="0"
                                                                           cellspacing="0" cellpadding="0"
                                                                           style="font-family:Helvetica,Arial,sans-serif"
                                                                           width="100%">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td><span
                                                                                    style="display:inline;padding-bottom:4px"> <h2
                                                                                        style="margin:0;word-wrap:break-word;color:#262626;word-break:break-word;font-weight:700;font-size:16px;line-height:1.5">Data</h2></span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="padding-bottom:8px">
                                                                                <table>
                                                                                    @foreach ($data as $key => $value)
                                                                                        <tr>
                                                                                            <td><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong></td>
                                                                                            <td>
                                                                                                {{ is_array($value) ? implode(", ", $value) : $value }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </table>

                                                                                <p><a href="{{$url}}">Visit portal</a></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%"
                                       bgcolor="#EDF0F3" align="center"
                                       style="background-color:#edf0f3;padding:0 24px;color:#6a6c6d;text-align:center">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table role="presentation" border="0" cellspacing="0" cellpadding="0"
                                                   width="100%">
                                                <tbody>
                                                <tr>
                                                    <td align="center" style="padding:0 0 12px 0;text-align:center">
                                                        <br/><br/>
                                                        <p style="margin:0;color:#6a6c6d;font-weight:400;font-size:12px;line-height:1.333">
                                                            Thanks, {{ config('app.name') }}
                                                        </p>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </center>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
