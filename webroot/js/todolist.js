$(document).ready
(function()
    {
            /**
             * 送信ボタンクリック 登録処理
             */
            $('#btnRegist').click
        (
            function()
            {
                var csrf = $('input[name=_csrfToken').val();
                //var subject = { request : $('#txtSubject').val() };
                var subject = $('[name = subject]').val();
                var person = $('[name = person]').val();
                var datetime = $('[name = datetime]').val();
                var priority = $('[name = priority]').val();
                var state = $('[name = state]').val();
                console.log("subject:"+subject);
                console.log("person:"+person);
                console.log("datetime:"+datetime);
                console.log("priority:"+priority);
                console.log("state:"+state);
                //alert( $('#txtSubject').val() );
                /**
                 * Ajax通信メソッド
                 * @param type : HTTP通信の種類
                 * @param url : リクエスト送信先のURL
                 * @param data : サーバに送信する値
                 */
                $.ajax
                (
                    {
                        type: 'POST',
                        datatype:'json',
                        // url: "http://localhost:1013/todolist/todolist/add",
                        url: "http://localhost/todolist/todolist/add",
                        data:
                        {
                            subject: subject,
                            person: person,
                            state: state,
                            priority: priority,
                            datetime: datetime,

                        },
                        beforeSend: function(xhr)
                        {
                            xhr.setRequestHeader('X-CSRF-Token', csrf);
                        },
                        success: function(subject,datatype)
                        {
                            //alert('【タスクを登録しました。】');
                            location.reload();
                            reset();
                        },
                        /**
                         * Ajax通信が失敗した場合に呼び出されるメソッド
                         */
                        error: function(XMLHttpRequest, textStatus, errorThrown)
                        {
                            alert('【タスクの登録に失敗しました。】:' + errorThrown);
                        }
                    }
                );
                return false;
            }
        );
    }
);
function reset()
{
    $('[name = subject]').val("");
    $('[name = person]').val("");
    $('[name = datetime]').val("");
    $('[name = priority]').val("");
    $('[name = state]').val("");
}
