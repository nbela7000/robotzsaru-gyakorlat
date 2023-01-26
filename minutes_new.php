<div id='fileview_content'>
<h1>Új jegyzőkönyv</h1><br />
<table id='fileview_table'>
    <tr>
        <td><b>Megnevezés</b></td>
        <td><input type='text' id='inputTitle' class='input-primary'></td>
    </tr>
    <tr>
        <td colspan='2' style='text-align:center;'><b>Tartalom</b></td>
    </tr>
    <tr>
        <td colspan='2'>
            <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea><br />
            <script>CKEDITOR.replace('editor1');CKEDITOR.config.width = '100%';</script>
        </td>
    </tr>
    <tr>
        <td colspan='2'><a class='button-primary submit-new-minute'>Létrehozás</a><span id='newminuteInfo' style='margin-left: 10px;'>&nbsp</span></td>
    </tr>
</table>
</div>
<script src='js/new_minute.js'></script>
