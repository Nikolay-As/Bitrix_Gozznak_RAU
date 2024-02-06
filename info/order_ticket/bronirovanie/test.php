<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Диалоговое и модальное окно</title>
	<style type="text/css">
		dialog {
			margin: auto;
 			position: absolute;
  		top: 0; left: 0; bottom: 0; right: 0;		  background: lightblue;
		  border: none;
		  border-radius: 1rem;
		}
	</style>
</head>
<body>
	<button id="open">Про типы данных</button>
    <dialog>
      <p>
        Когда начинаешь изучать JavaScript, сначала чувствуешь эйфорию: очень легко работать с переменными, не нужно следить за типами, просто назвал и пользуешься. Но с великой свободой приходит великая ответственность. Если вы только начинаете пользоваться этим языком, обратите внимание на нюанс с типами данных.

      </p>
      <p>
   			<button id="close">Закрыть окно</button>
  		</p>
    </dialog>
    <script>
      var dialog = document.querySelector('dialog')
      // выводим модальное окно
      document.querySelector('#open').onclick = function () {
        dialog.showModal()
      }
      // скрываем окно
      document.querySelector('#close').onclick = function () {
        dialog.close() 
      }
    </script>

</body>
</html>