<html>
<head>
    <title>Finding ID {{ $finding_num  }}</title>
</head>
<body>
    <table border="1px" cellpadding="2px" cellspacing="2px" style="width:100%;border-style:none;font-family:arial, sans-serif;font-size:14px">
    <tr>
        <td colspan="4" style="text-align:center">
            <strong>{{ $audit_title }}L</strong>
        </td>
    </tr>
    <tr>
        <td style="background-color:gray;height:15px" colspan="4"></td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Finding ID:</label></td>
        <td style="padding-left:5px;width:25$">{{ $finding_num }}</td>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Date Discovered:</label></td>
        <td style="padding-left:5px;width:25$">{{ $date_discovered }}</td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Finding Category:</label></td>
        <td style="padding-left:5px;width:25$" colspan="3">{{ $finding_category }}</td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Reference:</label></td>
        <td style="padding-left:5px;width:25$">{{ $reference }}</td>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Risk Level:</label></td>
        <td style="padding-left:5px;width:25$">{{ $risk }}</td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Response:</label></td>
        <td style="padding-left:5px;width:25$">{{ $finding_status }}</td>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Repeat Finding:</label></td>
        <td style="padding-left:5px;width:25$"> {{ $repeat_finding }}</td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Response Due:</label></td>
        <td style="padding-left:5px;width:25$">{{ $finding_due }}</td>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Entered By:</label></td>
        <td style="padding-left:5px;width:25$">{{ $entered_by  }}</td>
    </tr>

    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Issued To:</label></td>
        <td style="padding-left:5px;width:25$" colspan="3">{{ $assigned_to }}</td>
    </tr>

    <tr>
        <td style="background-color:gray;height:15px" colspan="4"></td>
    </tr>
    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Finding Descriptor:</label></td>
        <td colspan="3">{{ $descriptor  }}</td>
    </tr>
    <tr>
        <td style="padding-left:5px;width:25$"><label style="font-weight: bold">Finding Description:</label></td>
        <td style="padding-left:5px;width:25$" colspan="3"><p>{{ $findings }}</p></td>
    </tr>

    {{--<tr>--}}
        {{--<td style="background-color:#ff0000;height:25px;text-align:right;font-size:10px;color:white;padding-right:10px;font-weight:bold" colspan="4">QAD-R-016.00</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td colspan="4" style="border-style:none">--}}
            {{--<small><p>--}}
                    {{--The contents of this document are the proprietary work of SkyLogistics Phils. Inc. (SLPI). This document is issued to authorized users--}}
                    {{--only and shall always be treated as strictly confidential. Copying, reproducing using, editing, rearranging or adapting, disclosing,--}}
                    {{--divulging, furnishing or providing other persons access to this document, in whole or in part, or for purposes other than for which it was--}}
                    {{--provided to the user, without the written permission of SLPI, is strictly prohibited. Any person caught violating this prohibition shall be--}}
                    {{--prosecuted to the full extent of the law.--}}
                {{--</p></small>--}}
        {{--</td>--}}
    {{--</tr>--}}


</table>


</body>

</html>