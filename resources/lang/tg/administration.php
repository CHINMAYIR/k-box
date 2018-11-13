<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Administration Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used inside the DMS Administration area
    |
    */

    'page_title' => 'Aдминистраcия',

    'menu' => [

        'accounts'=>'Aккаунт',
        'language'=>'Забон',
        'storage'=>'Ҷойгиршавии захираҳо',
        'network'=>'Шабака',
        'mail'=>'Почта',
        'update'=>'Навсозӣ ва барқарорсозӣ',
        'maintenance'=>'Таъмир ва чорабиниҳо',
        'institutions'=>'Муассисаҳо/Ташкилотҳо',
        'settings'=>'Танзимотҳо',
        'identity' => 'Муайян кардан',
        'licenses' => 'Иҷозатномаҳо',
    ],

    'accounts' => [

        'disable_confirm' => 'Оё шумо ҳақиқатан мехоҳед  :name ғайрифаъол намоед',

        'create_user_btn' => 'Сохтани истифодабаранда',

        'table' => [

            'name_column' => 'Ном',
            'email_column' => 'email',
            'institution_column' => 'Ташкилот',

        ],
        
        'edit_account_title' => 'Таҳрири :name',

        'labels' => [

            'email' => 'Почта',
            'username' => 'Логин',
            'perms' => 'Ҳуқуқи дастрасӣ',

            'cancel' => 'Бекор кардан',

            'create' => 'Сохтан',
            'update' => 'Навсозӣ',

            'institution' => 'Ташкилот',
            'select_institution' => ' Ташкилоти истифодабаранда интихоб кунед ...',

            'generate_password' => 'Пароли корбаро эҷод кунед',
            'send_password' => 'Паролро ба истифодабаранда тавассути почтаи электронӣ ирсол кун',
            'no_password_sending' => 'Барои истифодабарандаи интихобшуда паролро нависед. Ягон сервери почтаи электронӣ танзим карда нашудааст, K-Box наметавонад бевосита тавассути почтаи электронӣ паролҳоро эҷод ва ирсол кунад.',

        ],

        'capabilities' => [

            'manage_dms' => 'Истифодабаранда метавонад ба панели K-Box дастрасӣ пайдо кунад',
            'manage_dms_users' => 'Истифодабаранда метавонад истифодабарандагони K-Box-ро идора кунад ',
            'manage_dms_log' => 'Истифодабаранда метавонад сабтҳои K-Box-ро бинад',
            'manage_dms_backup' => 'Истифодабаранда метавонад нусхабардорӣ ва барқароркунии K-Box-ро иҷро кунад',
            'change_document_visibility' => 'Истифодабаранда метавонад аёнияти cанадҳоро тағйир диҳад',
            'edit_document' => 'Истифодабаранда метавонад санадҳоро таҳрир кунад',
            'delete_document' => 'Истифодабаранда метавонад санадҳоро дур кунад',
            'import_documents' => 'Истифодабаранда метавонад файлҳоро аз ҷузвдонҳо ё URL-ҳои берунӣ интиқол диҳад',
            'upload_documents' => 'Истифодабаранда метавонад санадҳоро бор кунад',
            'make_search' => 'Истифодабаранда метавонад ҳамаи санадҳои хусусии ташкилотро дастрас намояд',
            'manage_own_groups' => 'Истифодабаранда  коллексияи санади шахсиро идора карда метавонад',
            'manage_institution_groups' => 'Истифодабаранда метавонад коллексияи ташкилотро идора кунад',
            'manage_project_collections' => 'Истифодабаранда метавонад коллексияҳои лоиҳаро идора кунад',
            
            'manage_share' => 'Истифодакунанда метавонад файлҳоро бо як ё гурӯҳи истифодабарандагони мубодила кунад',
            'receive_share' => 'Истифодабаранда метавонад санадҳои бо ӯ мубодилашударо бинад',
        
            'manage_share_personal' => 'Истифодабаранда метавонад санадҳои шахсиро бо як нафар ё гурӯҳи “шахсӣ” мубодила кунад',
            'manage_share_private' => 'Истифодабаранда метавонад санадҳоро ба гурӯҳи истифодабарандагон, ки дар сатҳи ташкилот муайян шудааст мубодила кунад',
            
            'clean_trash' => 'Истифодабаранда метавонад санадҳоро ба таври доими аз кутии партов тоза кунад',
            
            'manage_personal_people' => 'Истифодабарандагон метавонанд гурӯҳҳоеро, ки дар сатҳи шахсӣ муайян шудаанд, таҳия/таҳрир кунад',
            'manage_people' => 'Истифодабарандагон метавонанд гурӯҳҳоеро, ки дар сатҳи ташкилот муайян шудаанд, таҳия/таҳрир кунад',

        ],
        
        'types' => [

            'guest' => 'Меҳмон',
            'partner' => 'Шарик',
            'content_manager' => 'Менеҷери мӯҳтаво',
            'quality_content_manager' => 'Менеҷери сифати мӯҳтаво',
            'project_admin' => 'Администратори лоиҳаи',
            'admin' => 'Администратори K-Box',
            'klinker' => 'K-Linker',

        ],

        'create' => [

            'title' => 'Сохтани аккаунти нав',
            'slug' => 'Сохтан',

        ],

        'created_msg' => 'Истифодабаранда сохта шуда, парол ба почтаи истифодабаранда фиристода шуд',
        'created_password_sent_msg' => 'Истифодабаранда сохта шуда, парол ба почтаи истифодабаранда фиристода шуд',
        'created_no_mail_msg' => 'Истифодабаранда таъсис дода шуд. Мо наметавонем паролро ба почтаи электрониаш ирсол кунем',
        'edit_disabled_msg' => 'Шумо имкониятҳои аккаунти худро тағйир додан надоред. Танзимоти метавонад тавассути<a href=":profile_url">саҳифаи профили</a>тагйир шавад.',
        'disabled_msg' => 'Истифодабаранда :name фаъол нест',
        'enabled_msg' => 'Истифодабаранда :name фаъол шуд',
        'updated_msg' => 'Истифодабарандаи навсози шуд',
        'mail_subject' => 'Аккаунти K-Box-и шумо омода аст',
        'reset_sent' => 'Парол бо почтаи электронӣ  :name (:email) фиристонида шуд ',
        'reset_not_sent' => 'Парол бо почтаи электронӣ :email. :error фиристонида намешавад ',
        'reset_not_sent_invalid_user' => 'Почтаи электронӣ, :email, ёфт нашуд.',
        'send_reset_password_btn' => 'Пароли нав гузоред',
        'send_reset_password_hint' => 'Пайванди парол барои истифодабаранда дархост кунед',
        'send_message_btn' => 'Фиристодани паём',
        'send_message_btn_hint' => 'Ба ҳар як истифодабаранда паём фиристед',
    ],

    'language' => [

        'list_label' => 'Рӯйхати забонҳои дастгиришуда дар ин чо аст.',
        'code_column' => 'Рамзи забон',
        'name_column' => 'Номи забон',

    ],

    'storage' => [

        'disk_status_title' => 'Ҳолати диск',
        'documents_report_title' => 'Намудҳои санад',
        'disk_number' => 'Диск :number',
        'disk_type_all' => 'Диски асоси ва санадхо',
        'disk_type_main' => 'Диски асоси',
        'disk_type_docs' => 'Диски санадхо',
        'disk_space' => ':free <strong>холи</strong>, :used аз :total умуми.',

        'reindexall_btn' => 'Аз нав индексонидани ҳамаи санадҳо',

        'reindexing_status' => 'Аз нав индексонидани :number санад…',
        'reindexing_all_status' => 'Аз нав индексонидани ҳамаи санадҳо...',
        'reindexing_status_completed' => 'ҳамаи санадхо аз нав индексонида шуданд.',

        'naming_policy_title' => 'Конвентсияи номнависӣ',
        'naming_policy_description' => 'Шумо метавонед файлҳои, ки Конвентсияи номнависиро пайравӣ намекунанд, пешгирӣ кунед',

        'naming_policy_btn_activate' => 'Конвентсияи номнависиро фаъол кун',
        'naming_policy_btn_save' => 'Навсозӣ',
        'naming_policy_btn_deactivate' => 'Конвентсияи номнависиро гайрфаъол кун',

        'naming_policy_msg_activated' => 'Конвентсияи номнависи фаъол шуд',
        'naming_policy_msg_deactivated' => 'Конвентсияи номнависи гайрфаъол шуд',

    ],

    'network' => [

        'klink_net_title' => 'Пайвастшавии шабакаи K-Link',
        'ksearch' => 'Пайвастшавии муҳаррики K-Search',
        'ksearch_description' => 'Ҳолати пайвастагии K-Box ва муҳаррики ҷустуҷӯро нишон диҳед.',

        'network' => 'Пайвастшавӣ ба ":network"',
        'network_description' => 'Ҳолати пайвастагии K-Box ва шабакаи ҳамроҳро  нишон диҳед.',


        'klink_status' => [
            'success' => 'Насб ва санҷида шуд',
            'failed' => 'Пайваст карда намешавад',
        ]

    ],
    'mail' => [
        'save_btn' => 'Танзимоти почтаи электрониро хифз кунед',
        'configuration_saved_msg' => 'Танзимоти почтаи электрони бомуваффақият хифз шуд.',
        'test_success_msg' => 'E-Mail санҷиши (аз :from) фиристода шуд. Паёмдони худро тафтиш кунед.',
        'test_failure_msg' => 'E-Mail санҷиши аз сабаби хатоги фиристонида нашуд.',
        'enable_chk' => ' Фиристонидани E-Mail фаъол кун ',
        'enabled' => 'K-Box метавонад Е-Mail фиристонад',
        'enabled_by_configuration' => 'Паёми почтаи электронӣ тавассути конфигуратсияи тарроҳӣ имконпазир аст',
        'disabled' => 'K-Box наметавонад Е-Mail фиристонад',
        'test_btn' => 'E-Mail санҷиши фиристондан',
        'from_label' => 'E-Mail санҷиши фиристондан аз номи',
        'from_description' => 'Дар ин ҷо шумо метавонед ном ва суроғаро, ки барои ҳамаи паёмҳои почтаи электронӣ аз K-Box фиристода шудаанд, нишон диҳед.',
        'server_configuration_label' => 'Танзимоти сервер',
        'server_configuration_description' => 'Чӣ тавр K-Box ба сервери почтаи электронӣ пайваст мешавад',
        'from_name' => 'Ном (мисол Фируз)',
        'from_address' => 'Суроғаи E-Mail (мисол. firuz@klink.org)',
        'from_name_placeholder' => 'Фируз',
        'from_address_placeholder' => ' мисол firuz@klink.asia',
        'host_label' => 'Суроғаи мизбони SMTP',
        'port_label' => 'Порти SMTP',
        'encryption_label' => 'Сервери E-Mail бояд рамзи TLS кабул кунад',
        'username_label' => 'Номи SMTP Server',
        'password_label' => 'SMTP Server Password',
        'log_driver_used' => 'Роҳнамои сабт истифода мешавад. Шумо танзимоти серверро тағйир дода наметавонед.',
        'log_driver_go_to_log' => 'Паёмҳои почтаи электронӣ дар лог-файли K-Box навишта мешаванд. Шумо метавонед онро аз ин чо санҷед <a href=":link">Aдминистраcия > Таъмир ва чорабиниҳо</a>.',
    ],
    'update' => [],
    'maintenance' => [

        'queue_runner' => 'Раванди асинхронии кор',

        'queue_runner_started' => 'Оғоз шуд ва рӯйхат омода мекунад',
        'queue_runner_stopped' => 'Не иҷро намешавад',

        'queue_runner_not_running_description' => 'Реҷаи корӣ кор намекунад, бинобар ин, паёмҳои почтаи электронӣ ва нишондиҳандаҳои санадхо низ кор намекунад.',
        
        'logs_widget_title' => 'Вурудоти охирин',
    ],
    
    
    'institutions' => [
        
        'edit_title' => 'Таҳрири тафсилот :name ',
        'create_title' => 'Муассисаи нав таъсис диҳед',
        'create_institutions_btn' => 'Муассисаи нав ворид кунед',
        'saved' => 'Ташкилоти :name навсоз шуд.',
        'update_error' => 'Тафсилоти ташкилот сабт нашудааст: :error',
        'create_error' => 'Ташилот таъсис дода намешавад: :error',
        'delete_not_possible' => 'Номи ташкилот :name ба санадхо ва исифодабарандагон пайваст аст. Лутфан пеш аз дур кардан хамаи санадхо ва исфифодабарандагон ин ташкилотро дур кунед.',
        'delete_error' => 'Номи ташкилот :name дур карда намешавад: :error',
        'deleted' => 'Номи ташкилот аз байн бурда шуд.',
        'delete_confirm' => 'Дуркунии номи ташкилоти :name аз шабака?',
        'deprecated' => 'Идоракунии ташкилот дар холи тағйирёби. Барои тайёр кардани K-Box худ барои навсози мо илова намудан, таҳрир кардан ва дур кардани  ташкилотхоро гайрифаъол намудем..',
        
        'labels' => [
            'klink_id' => 'Муайянкунандаи ташкилот (дар шабакаи K-Link )',
            'name' => 'Номи ташкилот',
            'email' => ' Адреси элетронии ташкилот барои гирифтани иттилооти бештар',
            'phone' => 'Рақами телефони котиби ташкилот ',
            'url' => 'Суроғаи вебсайти ташкилот',
            'thumbnail_url' => 'Логотипи ташкилот (ё url-и логотип )',
            'address_street' => 'Сурогаи ташкилот',
            'address_country' => 'Кишвари ташкилот',
            'address_locality' => 'Шаҳри ташкилот',
            'address_zip' => 'Рамзи почта',
            'update' => 'Тафсилотро сабт кунед',
            'create' => 'Сохтани ташкилот'
        ],
    ],
    
    'settings' => [
        'viewing_section' => 'Дидани',
        'viewing_section_help' => 'Шумо метавонед санадҳоро танзим кунед ба тавре ки исифодабаранда онро мебинад.',
        'save_btn' => 'Танзимоти сабт кунед',
        'saved' => 'Танзимот навсозӣ шуд. Вақте ки истифодабарандагон саҳифаро боз хоҳанд кард, онҳо навсозии навро хоҳанд дид.',
        'save_error' => 'Танзимотро сабт карда наметавонад. :error',
        
        'map_visualization_chk' => 'Намоиши харитаҳоро фаъол кунед',
        
        'support_section' => 'Дастгирӣ',
        'support_section_help' => 'Агар шумо обунаи дастгирӣ дошта бошед, лутфан дар инҷо тасдиқ кунед, то ки истифодабарандагони шумо дархости худро пешниҳод кунанд ва кӯмак аз гурухи техникии K-Link гиред.',
        'support_token_field' => 'Нишони дастгири',
        'support_save_btn' => 'Танзимоти дастгирӣ -ро сабт кунед',

        'analytics_section' => 'Таҳлилҳо',
        'analytics_section_help' => 'Таҳлилҳо ба шумо имконият медиханд, то бинед чӣ тавр истифодабарандагон системаро истифода мебаранд.',
        'analytics_token_field' => 'Нишони Таҳлилҳо',
        'analytics_save_btn' => 'Танзимоти Таҳлилҳо -ро сабт кунед',
        
    ],

    'identity' => [
        'page_title' => 'Муайянкуни',
        'description' => 'Иттилооти ташкилоти Шумо, то ки истифодабарандагон тавонанд бо шумо тарики ”Саҳифаи тамос” тамос гиранд.',
        'not_complete' => 'Маълумотхо дар бораи тамос пурра нестанд.',
        'suggestion_based_on_institution_hint' => 'Мо ба таври автоматикӣ маълумотро барои тамос бо ташкилоти Шуморо аз K-Link пайдо намудем. Лутфан онҳоро аз назар гузаронед ва сабт кунед.',

        'contact_info_updated' => 'Маълумот барои тамос сабт шуд.',
        'update_error' => 'Маълумот барои тамос навсозӣ нашуд. :error',
    ],
    
        'documentlicenses' => [

        'no_licenses' => 'Барои ин K-Box литсензияи дастрас вуҷуд надорад.',
        'view_license' => 'Литсензияро бинед',
        'default_configuration_notice' => 'Ҳуқуқи муаллиф дар пешфарзи танзимот зери "Ҳама ҳуқуқҳо ҳифз шудаанд" муқаррар карда шудааст. Шумо метавонед онро тағйир дода, литсензияи дигари мувофиқтар ба хамкорихоятон интихоб кунед.',
        

        
        
        'default' => [
            'title' => 'Литсензияи пешфарз',
            'description' => 'Литсензияе, ки барои ҳамаи боргузориҳои оянда истифода мешавад, интихоб кунед.',
            'label' => '',
            'save' => 'Литсензияи пешфарзро сабт кунед',
            'no_licenses_error' => 'Литсензҳои имконпазир дар ин K-Box насб карда нашудаанд. Лутфан онҳоро пеш аз интихоби литсензияи оддӣро танзим кунед.',
            'saved' => 'Танзимоти ҳуқуқи муаллиф ҳифз шудаанд. Ҳуҷҷатҳои оянда ба таври ":title" худкор таъин карда мешаванд. Онҳоро метавонед дар саҳифаи таҳрирӣ алоҳида тағйир додан.',
            'select' => 'Литсензияро интихоб кунед',
            'apply_default_license_to_previous' => ':count ҳуҷҷатро ба литсензияи интихобгардида навсозӣ кунед|:count ҳуҷҷатҳоро ба литсензияи интихобгардида навсозӣ кунед',
            'apply_default_license_all' => 'Литсензияи пешфарзи интихобшударо барои хамаи ҳуҷҷатҳо мавҷуд буда истифода кун.',
        ],
        'available' => [
            'title' => 'Литсензҳои дастрас',
            'description' => 'Литсензия муайян менамояд, ки чӣ гуна дигарон метавонанд ҳангоми истифодаи санад шартҳои ҳуқуқи муаллифро риояи намоянд. Литсензияхоро интихоб кунед, ки барои истифодабарандагон хангоми боргузори кардани санад дастрас бошанд',
            'label' => '',
            'save' => 'Рӯйхати литсензияҳоро сабт кунед',
            'no_licenses_error' => 'Барои ин K-Box литсензияи дастрас вуҷуд надорад. Лутфан танзимоти K-Box-ро санҷед.',
            'saved' => 'Литсензҳои мавҷудбуда ба рӯйхат ворид шудаанд.',
        ],
    ],


];
