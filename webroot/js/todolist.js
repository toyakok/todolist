$(document).ready(function()
{
    /**
     * 送信ボタンクリック
     */
    $('#btnRegist').click(function()
    {
        var csrf = $('input[name=_csrfToken').val();
        var subject = { request : $('#txtSubject').val() };
        console.log(subject);
        alert( $('#txtSubject').val() );
        /**
         * Ajax通信メソッド
         * @param type : HTTP通信の種類
         * @param url : リクエスト送信先のURL
         * @param subject : サーバに送信する値
         */
        $.ajax({
            type: 'POST',
            datatype:'json',
            url: "http://localhost:1013/todolist/todolist/add",
            subject: subject,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf);
            },
            success: function(subject,datatype)
            {
                alert('Success');
            },
            /**
             * Ajax通信が失敗した場合に呼び出されるメソッド
             */
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error :' + errorThrown);
            }
        });
        return false;
    });
});
