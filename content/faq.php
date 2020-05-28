<p>Тут вы найдете ответы на вопросы о программе Unlocker.</p>
<h2>Инструкция по пользованию программой:</h2>
<ol>
	<li><p>Кликните на файл правой клавишей мыши</p>
		<?php echo Init::getImage( 'context_menu.png', 'Контекстное меню Windows', 'align-center' ); ?>
	</li>
	<li><p>Если файл заблокирован появится диалоговое окно</p>
		<?php echo Init::getImage( 'process.png', 'Окно Unlocker', 'align-center' ); ?>
	</li>
	<li>В появившемся окне выбирите действие, которое надо произвести с файлом(переименовать, удалить, переместить)</li>
	<li>Затем нажмите кнопку "<b>Разблокировать все</b>" или выбирите нужный процеес и нажмите "<b>Разблокировать</b>"
	</li>
</ol>

<h2>Часто задаваемые вопросы</h2>
<ul class="info-block">
	<li>
		<h3>Мой антивирус обеспокоен, содержит ли Unlocker рекламу(malware)?</h3>
		<p>Нет, Unlocker всегда будет бесплатным на 100%, более подробно читайте в <a
					href="http://www.emptyloop.com/blog/?p=69" target="blank">блоге автора</a> программы.</p>
	</li>
	<li>
		<h3>Unlocker перестал работать, что делать?</h3>
		<p>Деинсталируйте Unlocker, перезагрузите компьютер, удалите все ключи реестра, содержащие Unlocker,
			перезагрузите компьютер, установите программу заново.
		</p></li>
	<li>
		<h3>Ваш сайт не доступен, есть ли где-то официальное зеркало?</h3>
		<p>http://www.emptyloop.com/unlocker/ - официальная страница программы на английском языке.
		</p></li>
	<li>
		<h3>Работает ли Unlocker в операционных системах Windows Vista и Windows 7?</h3>
		<p>Да. Если Вы хотите отключить контроль учетных записей, перейдите в "Панель управления", затем "Учетные записи
			пользователей", затем опять "Изменение параметров контроля учетных записей", затем отключите уведомления,
			перезагрузите компьютер. Смотрите <a
					href="http://windows.microsoft.com/ru-ru/windows/turn-user-account-control-on-off#1TC=windows-7"
					target="_blank">инструкцию</a> на сайте Microsoft.
		</p></li>
	<li>
		<h3>Работает ли Unlocker на 64 битной версии Windows?</h3>
		<p>Да, начиная с версии 1.9.0.
		</p></li>
	<li>
		<h3>Может ли Unlocker быть запущен из командной строки?</h3>
		<p>Да! Введите в командной строке Unlocker -H
		</p></li>
	<li>
		<h3>Что такое "Error Debug Privileges"?</h3>
		<p>Это означает, что Ваши настройки безопасности не позволяют использовать Debug Privilege. Прочитайте </a>
			Microsoft и установите права "Debug Programs".
		</p></li>
	<li>
		<h3>Что такое "Error Backup Privileges"?</h3>
		<p>Это означает, что Ваши настройки безопасности не позволяют использовать Backup Privilege for your profile.
			Прочитайте <a target="_blank"
			              href="http://msdn.microsoft.com/library/default.asp?url=/library/en-us/vsdebug/html/vxtskdebuggerpermissions.asp">документацию</a>
			Microsoft, установите права и дирректории "Back up files and directories".
		</p></li>
	<li>
		<h3>Как установить привелегии в Windows XP home edition?</h3>
		<p>Загрузите <a target="_blank"
		                href="http://www.microsoft.com/downloads/details.aspx?FamilyID=9d467a69-57ff-4ae7-96ee-b18c4790cffd&DisplayLang=en">дистрибутив</a>
			и через командную строку установите необходимые привелегии: SeBackupPrivilege, SeDebugPrivilege and
			SeLoadDriverPrivilege. Пример установки привелегий отладки: ntrights +r SeDebugPrivilege -u
			ИмяВашегоАккаунта
		</p></li>
	<li>
		<h3>Как запускать Unlocker Explorer в бесшумном режиме?</h3>
		<p>Настоятельно не рекомендуется это делать, Вы всегда должны видеть какой процесс блокирует файл, так некоторые
			из них могут использоваться. Но если Вы все же хотите проигнорировать рекомендации, установите <a
					target="_blank" href="http://unlocker.emptyloop.com/Unlocker-Always-Silent.reg">это</a> в реестр.
		</p></li>
	<li>
		<h3>Как удалить index.dat?</h3>
		<p>Это очень просто: 1) в проводнике щелкните правой кнопкой мыши на файле index.dat и выберите Unlocker, 2)
			выберите "Удалить" в левом нижнем углу, 3) кликните "Разблокировать все" и Вы закончили!
		</p></li>
	<li>
		<h3>Я разблокировал все процессы, но попрежнему не могу вручную удалить файл, и когда я снова пытаюсь
			разблокировать файл Unlocker опять находит блокировки, что мне делать?</h3>
		<p>Выберите "Удалить" перед тем, как нажать "Разблокировать все".
		</p></li>
	<li>
		<h3>Почему мой фаервол говорит, что Unlocker пытается выйти в интернет?</h3>
		<p>Начиная с версии Unlocker 1.6.5, во время установки появляется настройка - автоматически проверять
			обновления. Переустановите Unlocker без этой опции, если хотите отключить ее. А вообще Unlocker просто
			отсылает запрос "GET /unlocker/version.txt HTTP/1.0\r\nHost: www.emptyloop.com\r\n" и ничего больше.
		</p></li>
	<li>
		<h3>Как перевести Unlocker на другой язык?</h3>
		<p>Загрузите <a target="_blank" href="http://www.emptyloop.com/unlocker/english.zip">данный</a> файл, переведите
			его и отошлите по адресу ccollomb@yahoo.com
		</p></li>
	<li>
		<h3>Является ли данный сайт официальным распространителем программы Unlocker?</h3>
		<p>Нет, не является. Данный сайт предоставляет ссылки приведенные на официальном сайте, в том числе и ссылки для
			загрузки самой программы. Данный сайт не хранит и не распространяет никакое программное обеспечение.
		</p></li>
	<li>
		<h3>Что такое Unlocker Assistant?</h3>
		<p>Unlocker Assistant сидит в области уведомлений(рядом с часами) и запускает Unlocker, если Вы пытаетесь
			удалить / переименовать / переместить заблокированный файл. Тем, кто использует Unlocker Assistant, нет
			необходимости вызывать котекстное меню щелчком правой клавиши мыши. Эта возможность может быть отключена во
			время установки.
		</p></li>
	<li>
		<h3>Как я могу отблагодарить автора программы?</h3>
		<p>Для этого перейдите на официальный сайт программы к пункту <a target="_blank"
		                                                                 href="http://www.emptyloop.com/unlocker/#donate">Donate</a>,
			выберите сумму, которую Вы желаете перечислить автору программы Unlocker и нажмите "Donate", далее следуйте
			инструкциям платежной системы PayPal.</p></li>
</ul>
