/* users (Admin123) */
INSERT INTO sowa.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at)
VALUES  (1, 'Mirodil', 'mirodil@gmail.com', NULL, '$2y$10$./AUDwmg/klSrJgMxuyxyepm8ZPfV.IZS8cepR/RkGUIhAHRDG/re', NULL, '2021-06-22 12:18:49', '2021-06-22 12:18:49');

/* categories */
INSERT INTO sowa.categories (id, category)
VALUES  (1, '{"en": "App", "ru": "Мобильные приложения", "uz": "Mobil ilova"}'),
        (2, '{"en": "Web design", "ru": "Веб-дизайн", "uz": "Veb dizayn"}'),
        (3, '{"en": "Design", "ru": "Графический дизайн", "uz": "Grafika dizayn"}'),
        (4, '{"en": "SMM Marketing", "ru": "SMM Маркетинг", "uz": "SMM Marketing"}'),
        (5, '{"en": "CRM systems", "ru": "CRM системы", "uz": "CRM tizimlar"}');

/* projects */
INSERT INTO sowa.projects (id, slug, main_title, main_image, client, year, url, deleted_at, created_at, updated_at)
VALUES  (1, '{"en": null, "ru": "yuridik", "uz": null}', '{"en": null, "ru": "Веб-сайт для сервиса по оказанию юридических консультаций", "uz": null}', 'projects/Mo37k3hC83q5PtT36Q8TATYoRJmykczm7KE1FESX.png', 'Yuridik Xizmat', 2019, NULL, NULL, '2021-06-22 14:16:08', '2021-06-22 14:16:08'),
        (2, '{"en": null, "ru": "soomi", "uz": null}', '{"en": null, "ru": "Ответственная компания по доставке.", "uz": null}', 'projects/vQsbvpVpyQE1QynL9jjAPoQOVDabWXVmMikUzq42.png', 'SOOMI', 2020, NULL, NULL, '2021-06-22 14:18:19', '2021-06-22 14:18:19'),
        (3, '{"en": null, "ru": "kidya", "uz": null}', '{"en": null, "ru": "Приложение для заказа детских товаров с доставкой", "uz": null}', 'projects/gTrIU062zh6Xs2bMblthhlfIA14Uk9XYo7zjzorL.png', 'KIDYA', 2021, NULL, NULL, '2021-06-22 14:20:14', '2021-06-22 14:20:14'),
        (4, '{"en": null, "ru": "asturia-manus", "uz": null}', '{"en": null, "ru": "Компания по производству пищевого льда премиум класса.", "uz": null}', 'projects/G0SvNa6JhvwWzFc1PAIuwudRxjMpSA6eawClqQNv.png', 'Asturia Manus', 2019, NULL, NULL, '2021-06-22 14:21:49', '2021-06-22 14:21:49'),
        (5, '{"en": null, "ru": "alistore", "uz": null}', '{"en": null, "ru": "Интернет-магазин электроники", "uz": null}', 'projects/NgE2LtgltEbhmzxdxpB1aOvsWhOpN3h7XnzjAwzl.png', 'Alistore', 2020, 'http://alistore.uz/', NULL, '2021-06-22 14:23:58', '2021-06-22 14:23:58'),
        (6, '{"en": null, "ru": "wisdom", "uz": null}', '{"en": null, "ru": "Англо-Узбекский Словарь", "uz": null}', 'projects/ziovJs3DbPywTRshq3odJMY7CHxv08oML5UB6Wot.png', 'WISDOM STUDY CENTER', 2019, NULL, NULL, '2021-06-22 14:25:52', '2021-06-22 14:25:52'),
        (7, '{"en": null, "ru": "bbq", "uz": null}', '{"en": null, "ru": "Мобильное приложение для заказа еды", "uz": null}', 'projects/7oWmfysqx2Z1ClfVfAvJqPHvjRdIR6djDYch4wzt.png', NULL, NULL, NULL, NULL, '2021-06-22 14:31:55', '2021-06-22 14:31:55'),
        (8, '{"en": null, "ru": "alchiroq", "uz": null}', '{"en": null, "ru": "Мобильное приложение для получения бонусов от UCELL", "uz": null}', 'projects/wp5abbbZZyRCozwD26aE3VnDhHD7bayLFj0FPi4L.png', NULL, NULL, NULL, NULL, '2021-06-22 14:36:40', '2021-06-22 14:36:40');

/* project_contents */
INSERT INTO sowa.project_contents (id, project_id, type, position, title, description, image)
VALUES  (1, 1, 'text', 1, '{"en": null, "ru": "Yuridik – онлайн платформа для оказания юридической помощи гражданам Узбекистана.", "uz": null}', '{"en": null, "ru": "Yuridik.uz - это платформа для онлайн-юридических услуг, которая служит средством общения между юристами и клиентами. У пользователя есть возможнось задать любой вопрос и получить грамотный ответ от юристов. Возможен возврат средств, если пользователь недоволен ответом.", "uz": null}', NULL),
        (2, 1, 'image-small', 2, NULL, NULL, '{"image": "projects/dwXohIQwieRZfGi1nLw3baTKmnRm7b5RPJ8x6elh.png"}'),
        (3, 1, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Создать удобный портал, где каждый гражданин РУз мог получить профессиональную консультацию на бесплатной основе или платной основе.", "uz": null}', NULL),
        (4, 1, 'slide', 4, NULL, NULL, '{"slide": ["projects/mOcVWLfJ4jTctaTRzAFRftELUMxm87XzVIYXvyk3.png", "projects/rRLahYgvflHERxPCJBK5B6CaYkn87TujkaiavIaK.png", "projects/fkgeMzFHNYqFYPx0tEZNzwYTuRVKd9GlU5iNo8nq.png"]}'),
        (5, 1, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Портал был разработан с учетом максимального удобства для людей любых возрастов. Это стало возможным благодаря понятному и простому интерфейсу. Платформа действует на узбекском и русском языках.", "uz": null}', NULL),
        (6, 1, 'image-big', 6, NULL, NULL, '{"image": "projects/uTCe3BPFOyzSWwu7BWz99K4lQadIn8Ld0jngXW1K.png"}'),
        (7, 2, 'text', 1, '{"en": null, "ru": "SOOMI - tech-first ответственная компания по доставке.", "uz": null}', '{"en": null, "ru": "Glovo - это приложение, которое позволяет за несколько минут получить лучшие товары в вашем городе. SOOMI связывает пользователей, компании и курьеров, чтобы взаимодействие было удобным и оперативным.", "uz": null}', NULL),
        (8, 2, 'image-small', 2, NULL, NULL, '{"image": "projects/c6Zat8wmTEUw25aF553BVNGwHRZP6vaY5XnXRKcH.png"}'),
        (9, 2, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Необходимо было сделать быстрое и легкое в пользовании приложение для мобильных устройств. \\r\\n\\r\\nА именно, где клиенты могли бы: \\r\\n\\r\\n - выбрать товары и продукты в любой точке города;\\r\\n - заказать доставку до двери.", "uz": null}', NULL),
        (10, 2, 'slide', 4, NULL, NULL, '{"slide": ["projects/v8iVSkayGtBant9hiXhpnvIT1mMDsV1mrLTHEqup.png", "projects/DxtJuuivtsB9KS8b5SJhCKJX0cjFkFpgZd3BAl58.png", "projects/smr7LnPSumZIzkCYJazbAJOFA3hxZ43rm6wrQs8o.png"]}'),
        (11, 2, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Разработано мобильное приложение, работающее на планшетных и мобильных устройствах под Android и iOS.В его основе – каталог товаров и продуктов с подробным описанием. Современный и технологичный интерфейс. Возможность оформить доставку внутри приложения. Просмотр интересных акций. Приложение бесплатное и доступно для скачивания в Google Play и App Store.", "uz": null}', NULL),
        (12, 2, 'image-big', 6, NULL, NULL, '{"image": "projects/k4Sxmiw96samM67HniplNKz2S4uX1zmUCUMipW2p.png"}'),
        (13, 3, 'text', 1, '{"en": null, "ru": "ПРИЛОЖЕНИЕ ДЛЯ ЗАКАЗА ДЕТСКИХ ТОВАРОВ С ДОСТАВКОЙ", "uz": null}', '{"en": null, "ru": "Все категории товаров для детей от 0 до 12 лет.Удобный и легкий метод поиска и заказа детских товаров в несколько кликов.Широкой выбор качественных детских товаров на все случаи жизни.Регулярные акции, скидки и розыгрыши.", "uz": null}', NULL),
        (14, 3, 'image-small', 2, NULL, NULL, '{"image": "projects/cRBRwHxI9iXW1lGWUN9HOz2ZPpqrexZ7Ju10GJz0.png"}'),
        (15, 3, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Необходимо было сделать быстрое и легкое в пользовании приложение для мобильных устройств. \\r\\n\\r\\nА именно, где клиенты могли бы: \\r\\n\\r\\n - ознакомиться с каталогом детских товаров;\\r\\n - узнавать о действующих рекламных акциях;\\r\\n - оформить доставку в самом приложении.", "uz": null}', NULL),
        (16, 3, 'slide', 4, NULL, NULL, '{"slide": ["projects/PjMjwWawy7dqW7fJOzjTjb018LH0HcOMJXFMZfP9.png", "projects/BpxC9ZTK1okIUvxVWAkwNbj0gZP4Aa0r1BrJdLRU.png", "projects/rq7fwsAylk89CDVsM5PiqGgyLDHlrdsYY7tiTJaK.png"]}'),
        (17, 3, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Разработано мобильное приложение, работающее на планшетных и мобильных устройствах под Android и iOS. Приятный и дружественный интерфейс. Возможность оформить доставку внутри приложения. Просмотр интересных акций. Приложение бесплатное и доступно для скачивания в Google Play и App Store.", "uz": null}', NULL),
        (18, 3, 'image-big', 6, NULL, NULL, '{"image": "projects/Jef9HyWXQjWDlm9inTXiB631AqThknjteWNcs0Dc.png"}'),
        (19, 4, 'text', 1, '{"en": null, "ru": "Asturia Manus – компания занимается производством пищевого льда премиум качества.", "uz": null}', '{"en": null, "ru": "Разработать сайт, который будет отражать неповторимость проекта и его премиальность. Сайт ориентирован на развитие в странах СНГ.", "uz": null}', NULL),
        (20, 4, 'image-small', 2, NULL, NULL, '{"image": "projects/fsUCd4PF9qBWsS7SRdTOcL5rxhUriBBlSomAypBs.png"}'),
        (21, 4, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Разработать сайт, который будет выделяться среди конкурентов и показать преимущества льда премиум класса, который не тает в течение 6 часов при высокой температуре. Из технических задач – разработка сервиса доставки.", "uz": null}', NULL),
        (22, 4, 'slide', 4, NULL, NULL, '{"slide": ["projects/AbWp9H9iahHA4kLgRBv3u0R9p44pL4yS46iqlxTu.png", "projects/KsvulURzvWPaVhzZCmvY1B0kHgLEXUWPrXmDyiQY.png", "projects/L8Lxea84Havn7a1nb5i1CCQzGLA3LYEAXMwYeSUM.png"]}'),
        (23, 4, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Создан сайт с уникальным дизайном, что выделяет компанию и преимущества их продукции. Это повышает узнаваемость и статус бренда. Разработан сервис доставки с возможностью оставлять заявку непосредственно на самом сайте.", "uz": null}', NULL),
        (24, 4, 'image-big', 6, NULL, NULL, '{"image": "projects/5MW9YSQC6EsXa4F0QQuC6qw0lqiAZwIv1ONbkeem.png"}'),
        (25, 5, 'text', 1, '{"en": null, "ru": "AliStore.uz– один из удобных интернет-магазинов\\r\\nмобильной, цифровой и бытовой техники в\\r\\nУзбекистане.", "uz": null}', '{"en": null, "ru": "AliStore.uz – это интернет-магазин мобильной, цифровой и бытовой техники в Узбекистане. Мы создали сайт, который интуитивно понятен и удобен в использовании. Внедрена функция рассрочки и онлайн консультирования 24/7, чтобы все имели возможность приобрести любой товар по самой привлекательной цене в Республике.", "uz": null}', NULL),
        (26, 5, 'image-small', 2, NULL, NULL, '{"image": "projects/luKXBMSdlSEN3k6m9rGXApd4Q855Z1sAGQZjK9uD.png"}'),
        (27, 5, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Разработать интернет-магазин, чтобы создать покупателям все условия для быстрой и удобной покупки товаров. Также добавить возможность уведомлять посетителей о скидках и о горячих предложениях.", "uz": null}', NULL),
        (28, 5, 'slide', 4, NULL, NULL, '{"slide": ["projects/LyEs0jDlVSC4aohrjbtAgwlvpQUzpXhCu3ART9yK.png", "projects/H7L1IrgDEgSETrz7XzXfi57jV0bihHwEHQJLQoQj.png", "projects/c3RZwlUsDqf7ULRXW8lyqwA6acm0lmgy8ejILkSo.png"]}'),
        (29, 5, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Нами был разработан удобный сайт, где каждый посетитель легко сможет найти интересующий его товар. Внедрены несколько платежных систем для того, чтобы покупатель мог осуществить покупку в один клик.", "uz": null}', NULL),
        (30, 5, 'image-big', 6, NULL, NULL, '{"image": "projects/z8qaCQKP3l5A6CTo1937r9iBqwphsi1iJzWJjROI.png"}'),
        (31, 6, 'text', 1, '{"en": null, "ru": "WISDOM DICTIONARY - Первый цифровой словарь в Узбекистане", "uz": null}', '{"en": null, "ru": "Словарь – незаменимый помощник, который подскажет перевод любого слова. \\r\\n\\r\\nЦифровой словарь от WISDOM, поможет повысить грамматические навыки. Для того, чтобы изучение языка не было рутинным, мы внедрили интересные задачи и тесты.", "uz": null}', NULL),
        (32, 6, 'image-small', 2, NULL, NULL, '{"image": "projects/IzdS711jms275HeQiUih8aFm2uG9y1TM7PuriQAK.png"}'),
        (33, 6, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Разработать мобильное приложение - словарь для учебного центра WISDOM, чтобы его студенты имели возможность обучаться онлайн и развивать свои навыки английского языка.", "uz": null}', NULL),
        (34, 6, 'slide', 4, NULL, NULL, '{"slide": ["projects/Cnxf2BYR8uxFPc48pwCCa3xycsDLUwvurl6TAE0K.png", "projects/nFr8XIDFzGUc7hJEIYSBVTgmr25uQw7tKyIu1vvH.png", "projects/csmQXm1NbxD1QPFXSJUURhyLmNEqd1NVoAFrbPwp.png"]}'),
        (35, 6, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Разработано мобильное приложение, работающее на планшетных и мобильных устройствах под Android и iOS.\\r\\n\\r\\nВ его основе: \\r\\n\\r\\n 1. Цифровой словарь\\r\\n 2. Квесты по грамматике\\r\\n 3. Квесты и интересные задачи по английскому языку.\\r\\n\\r\\nПриложение бесплатное и доступно для скачивания в Google Play и App Store.", "uz": null}', NULL),
        (36, 6, 'image-big', 6, NULL, NULL, '{"image": "projects/hdDeb0vJpzMuePYnHpxtR8343WGTI4pQBP5wezlj.png"}'),
        (37, 7, 'text', 1, '{"en": null, "ru": "Описание проекта", "uz": null}', '{"en": null, "ru": "Удобное и стильное приложение, в котором можно оформить заказ еды в несколько кликов и оплатить банковской картой. Внедрена карта с координатами ближайших филиалов.", "uz": null}', NULL),
        (38, 7, 'image-small', 2, NULL, NULL, '{"image": "projects/IP1z1cmh38N8sxjR4rWIN6YH7LOu9D0WM2qbNKgm.png"}'),
        (39, 7, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Разработать приложение для моментального оформления заказа 24/7. \\r\\n\\r\\nНеобходимо было внедрить:\\r\\n\\r\\n - оплата заказа банковскими картами;\\r\\n - возможность оформления предварительного заказа;\\r\\n - выбор типа оповещения о состоянии заказа (sms или звонок оператора);\\r\\n - сохранение истории всех заказов.", "uz": null}', NULL),
        (40, 7, 'slide', 4, NULL, NULL, '{"slide": ["projects/eELJ5T6fElEpignM9aPsKHe4QHkBLVlfdNUnqr7m.png", "projects/roMhAlJhy43xWXROk2HlKIHxrJl9689V55EUFuAF.png", "projects/ALIbjei35KOq6tLmH22HoY0VtpvQ0vqWiobIkvi0.png"]}'),
        (41, 7, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Разработано мобильное приложение, отвечающее всем запросам заказчика. Работает на планшетных и мобильных устройствах Android и iOS. Возможность оформить доставку внутри приложения. Приложение бесплатное и доступно для скачивания в Google Play и App Store.", "uz": null}', NULL),
        (42, 7, 'image-big', 6, NULL, NULL, '{"image": "projects/5Zkchfq2vujkHDzB692wLvSgIxab8BQyIJEcNiBp.png"}'),
        (43, 8, 'text', 1, '{"en": null, "ru": "Описание проекта", "uz": null}', '{"en": null, "ru": "Приложение предназначено, чтобы пользователи могли получить дополнительные лимиты для общения. Необходимо просто скачать приложение и потереть лампу Алладина, после этого бонусы Al-Chiroq назначаются случайным образом.", "uz": null}', NULL),
        (44, 8, 'image-small', 2, NULL, NULL, '{"image": "projects/QPe8RpyayAIw2xasGjSv9HZ1oTo8QGtu8ghGQZTK.png"}'),
        (45, 8, 'text', 3, '{"en": null, "ru": "Задача", "uz": null}', '{"en": null, "ru": "Разработать приложение с интерактивными элементами, которое будет привлекать пользователей и побуждать к повторному использованию.", "uz": null}', NULL),
        (46, 8, 'slide', 4, NULL, NULL, '{"slide": ["projects/wEZ5oKtVrPEbIS51E1MXnIwfcKrJdiDKdHyEkZ6c.png", "projects/NvMWgcVtnLiwai6jggLZUmIGbJLreqrOYeh56njn.png"]}'),
        (47, 8, 'text', 5, '{"en": null, "ru": "Сделано", "uz": null}', '{"en": null, "ru": "Разработано мобильное приложение, доступно для бесплатного скачивания на планшетные и мобильные устройства Android и iOS. \\r\\n\\r\\nВнедрено:\\r\\n\\r\\n - иллюстрации Алладина и волшебной лампы, которую нужно потереть для получения бонусов;\\r\\n - интерактивная игра и призыв заходить в приложение ежедневно;\\r\\n - удобный и легкий в использовании интерфейс;\\r\\n - моментальное зачисление бонусов.", "uz": null}', NULL),
        (48, 8, 'image-big', 6, NULL, NULL, '{"image": "projects/k9Yu1ZnuvaIp9q4l1wlLL6zkxIR4Z9QKOHVm0m7e.png"}');

/* category_projects */
INSERT INTO sowa.category_project (project_id, category_id)
VALUES  (2, 1),
        (3, 1),
        (6, 1),
        (7, 1),
        (8, 1),
        (1, 2),
        (4, 2),
        (5, 2);

/* slides */
INSERT INTO sowa.slides (id, title, sub_title, description, category_id, image, position, deleted_at)
VALUES  (1, '{"en": "Mobile applications", "ru": "Мобильные приложения", "uz": "Mobil ilovalar"}', '{"en": null, "ru": "MOBILE APPS", "uz": null}', '{"en": "A mobile application is an opportunity to increase sales and loyalty of your customers. Now your business is always in the pocket of customers. You can always be in touch and use all the ways to stimulate purchases. And we will help make this application convenient and understandable so that it becomes a powerful marketing tool.",  "ru": "Мобильное приложение - это возможность увеличения продаж и лояльности ваших клиентов. Теперь ваш бизнес всегда находится в кармане у клиентов. Вы можете всегда быть на связи и применять все способы стимулирования покупок. А мы поможем сделать это приложение удобным и понятным, чтобы оно стало мощным маркетинговым инструментом.", "uz": "Mobil ilova sizning mijozlaringizning sotuvini va sodiqligini oshirish imkoniyatidir. Endi sizning biznesingiz har doim mijozlarning cho''ntagida. Siz har doim aloqada bo''lishingiz va xaridlarni rag''batlantirishning barcha usullarini qo''llashingiz mumkin. Va biz ushbu ilovani qulay va tushunarli qilib, kuchli marketing vositasiga aylantirishga yordam beramiz."}', 1, 'slides/9xZQyd7iHhXLOofGz1VdB8lYCQSDvQQ3ZzHulOxU.jpg', 1, NULL),
        (2, '{"en": "Web design", "ru": "Веб-дизайн", "uz": "Veb-dizayn"}', '{"en": null, "ru": "Web development", "uz": null}', '{"en": "The presence of the company''s website shows its technological effectiveness and supports its image. Modern design and a detailed description of the company''s activities are the key to high sales and creating a positive opinion of customers.",  "ru": "Наличие сайта у компании, показывает её технологичность и поддерживает её иммидж. Современный дизайн и детальное описание деятельности компании - это ключ к высоким продажам и созданию положительного мнения клиентов.", "uz": "Kompaniyadan sayt mavjudligi uning ishlab chiqaruvchanligini ko''rsatadi va uning imidjini qo''llab-quvvatlaydi. Kompaniyaning zamonaviy dizayni va faoliyatining batafsil tavsifi yuqori savdoning kalitidir va mijozlarning ijobiy fikrini yaratadi."}', 2, 'slides/1NAyTqqHUCOneq0w7weQmRmVO1vT3vfFCyyE1pA9.jpg', 2, NULL),
        (3, '{"en": "Graphic design", "ru": "Графический дизайн", "uz": "Grafik dizayn"}', '{"en": null, "ru": "Design", "uz": null}', '{"en": "The design is able to emphasize the image and status of the company. Because the right visual design increases conversion and interest in the brand.",  "ru": "Дизайн способен подчеркнуть иммидж и статус компании. Потому что правильное визуальное оформление увеличивает конверсию и интерес к бренду.", "uz": "Dizayn kompaniyaning obro''si va maqomini ta''kidlashi mumkin. To''g''ri vizual dizayn brendga aylantirish va qiziqishni oshiradi."}', 3, 'slides/UgPSbdZI3KA19jjZUpm9vIi20lpJ3NVqbqQo1jRr.jpg', 3, NULL),
        (4, '{"en": null, "ru": "SMM Маркетинг", "uz": null}', '{"en": null, "ru": null, "uz": null}', '{"en": null, "ru": "Социальные сети - это отличный инструмент для раскрутки бренда, повышения продаж и узнаваемости. Мы создадим СММ-стратегию, которая позволит донести ценности, уникальность и быть понятными для вашей целевой аудитории.", "uz": null}', 4, 'slides/n1hQqvQAv0GmT9zWFNKw1Oyts08uY0IuFwC1O9dY.jpg', 4, NULL),
        (5, '{"en": null, "ru": "CRM системы", "uz": null}', '{"en": null, "ru": null, "uz": null}', '{"en": null, "ru": "Мы одни из немногих кто прошел официальную сертификацию amoCRM подтверждающую возможность внедрения продукта под ключ!", "uz": null}', 5, 'slides/Qflk9To6ie3CRy4zQydchohT1zqCiW13phDhl2Ai.jpg', 5, NULL);

/* abouts */
INSERT INTO sowa.abouts (id, image, image_title, about_title, about_description, help_title, help_description, deleted_at)
VALUES  (1, 'about/JitFKR2qgR0LicAGoBE6dXClqgNNWn9v4gtyyD8Q.jpg', '{"en": null, "ru": "Уникальность и донесение правильных смыслов - залог высоких продаж.", "uz": null}', '{"en": null, "ru": "Digital-agency SOWA", "uz": null}', '{"en": null, "ru": "В диджитал агенстве SOWA мы предоставляем комплексные услуги, чтобы на выходе вы получили проект готовый к запуску. В нашей команде трудятся дизайнеры, верстальщики, программисты, аналитики, маркетологи и копирайтеры. За выполнением каждого проекта следит проект-менеджер, который курирует работу каждого специалиста. Вам не нужно будет искать отдельно подрядчиков и следить за выполнением каждого задания, мы берём на себя ответственность за качественное выполнения всех задач.", "uz": null}', '{"en": null, "ru": "Как и чем еще мы можем вам помочь?", "uz": null}', '{"en": null, "ru": "Разработка сайтов и обеспечение их правильной работы;\\r\\n\\r\\nSEO-продвижение;\\r\\n\\r\\nСоздание иммиджа и увеличение узнаваемости на рынке;\\r\\n\\r\\nРазработка логотипов и айдентики бренда;\\r\\n\\r\\nПродвижение в социальных сетях.", "uz": null}', NULL);

/* about_lists */
INSERT INTO sowa.about_lists (id, about_id, title, list, deleted_at)
VALUES  (1, 1, '{"en": null, "ru": "Стратегия", "uz": null}', '{"ru": ["Аналитика данных", "Исследование пользователей", "Стратегия контента", "Цифровая стратегия"]}', NULL),
        (2, 1, '{"en": null, "ru": "Креатив и Дизайн", "uz": null}', '{"ru": ["Анимации", "Дизайн мобильных приложений", "Брендинг", "Креативные идеи", "UX & UI"]}', NULL);

/* customers */
INSERT INTO sowa.customers (id, position, name, logo)
VALUES  (1, 1, 'Asturia Manus', 'brands/EppKdvBtmPcXIUk43DmZVGU26zVjOYSE3azQcfeh.png'),
        (2, 2, 'BBQ', 'brands/C9944CzX3CmImMKaSXoU5ttbkyHAvwta4qRI3Ksa.png'),
        (3, 3, 'Discovery', 'brands/SyyVPgoLGKZBk6dk12tcrWedlng9g8K2jKe7r01J.png'),
        (4, 4, 'Abror Yunusov', 'brands/ssy23LIgTfnWLtPgF6teHAZ8EybQWdJ9VbVCxGkS.png'),
        (5, 5, 'Hair Shop', 'brands/503lzMYMeQBF1XkvrkDlT1yCGFjfUQfWUtOQyTeE.png');

/* company_contacts */
INSERT INTO sowa.company_contacts (id, phone, email, address, google_map)
VALUES  (1, '["+998 90 176 62 22"]', '["info@sowa.uz"]', 'Узбекистан, Ташкент улица Аккурган, 29', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.091271499539!2d69.3055387383421!3d41.329694802707515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef4c73708ffff%3A0xe52cd4bf2ce55aac!2z0KjQvtGDINCR0L7RgNGM0LHQsCDQo9C80L7Qsg!5e0!3m2!1sru!2s!4v1611902200724!5m2!1sru!2s');

/* social_media */
INSERT INTO sowa.social_media (name, company_contact_id, url, logo)
VALUES  ('Facebook', 1, 'https://www.facebook.com/sowa.digitaluz/', 'about/logo/facebook.svg'),
        ('Instagram', 1, 'https://www.instagram.com/sowadigital.uz/?hl=ru', 'about/logo/instagram.svg'),
        ('Linkedin', 1, 'http://linkedin.com/', 'about/logo/linkedin.svg'),
        ('Telegram', 1, 'https://t.me/usersale202', 'about/logo/telegram.svg');

/* user_contacts */
INSERT INTO sowa.user_contacts (id, name, phone, message, status, comment, deleted_at, created_at, updated_at)
VALUES  (1, NULL, '+998 99 999 99 99', NULL, 'not reviewed', NULL, NULL, '2021-06-22 14:48:17', '2021-06-22 14:48:17'),
        (2, 'Test Person', '+998 90 000 00 00', 'Test message', 'not reviewed', NULL, NULL, '2021-06-22 14:48:55', '2021-06-22 14:48:55');
