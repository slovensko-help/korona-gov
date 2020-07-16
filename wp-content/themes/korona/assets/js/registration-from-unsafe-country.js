function rcLpad(string, padstring) {
    return padstring.substring(0, padstring.length - string.length) + string;
}

function prefillRcFormWithTestData() {
    $('.js-uc-add-country').click().click();

    $('#country-inner-uc-country').val('Nemecko');
    $('#country-inner-other-1').val('Česko');
    $('#country-inner-other-2').val('Švajčiarsko');
    $('#municipality-inner-uc-isolation-municipality').val('Bratislava - Ružinov');

    var rcYear = parseInt(20 - Math.round(Math.random() * 20));
    var rcMonth = parseInt(12 - Math.round(Math.random() * 11));
    var rcMaxDays = (new Date(rcYear, rcMonth, 0)).getDate();
    var rcDay = parseInt(rcMaxDays - Math.round(Math.random() * (rcMaxDays - 1)));
    var rcMonthReal = rcMonth;
    rcMonth += Math.round(Math.random()) * 50;

    var rc = rcYear * 10000 + (rcMonth + Math.round(Math.random()) * 50) * 100 + rcDay;

    rc = rc * 10000 + 1234;
    rc = '' + Math.floor(rc / 11) * 11;
    rc = rcLpad(rc, '0000000000');
    rc = rc.substring(0, 6) + '/' + rc.substring(6, 10);

    $('#uc-first-name-1').val('Janko');
    $('#uc-last-name-1').val('Mrkvička');
    $('#uc-id-slovak-1').val(rc);
    $('#uc-dob-day-1').val(rcDay);
    $('#uc-dob-month-1').val(rcMonthReal);
    $('#uc-dob-year-1').val(2000 + rcYear);
    $('#uc-insurance-1-dovera').attr('checked', true).prop('checked', true);
    $('#uc-email').val('test@testovic.sk');
    $('#uc-phone').val('+421919123456');
    $('#uc-isolation-street').val('Hrachovofazuľová');
    $('#uc-isolation-house-number').val('123');
    $('#uc-isolation-zip').val('82104');
    $('#uc-tos').attr('checked', true).prop('checked', true);

    setTimeout(function() {
        $('.autocomplete__option').click();
    }, 100);
}

(function($) {

    var MUNICIPALITY_TO_COUNTY = [["Bratislava-Staré Mesto","Bratislava I"],["Bratislava-Podunajské Biskupice","Bratislava II"],["Bratislava-Ružinov","Bratislava II"],["Bratislava-Vrakuňa","Bratislava II"],["Bratislava-Nové Mesto","Bratislava III"],["Bratislava-Rača","Bratislava III"],["Bratislava-Vajnory","Bratislava III"],["Bratislava-Devín","Bratislava IV"],["Bratislava-Devínska Nová Ves","Bratislava IV"],["Bratislava-Dúbravka","Bratislava IV"],["Bratislava-Karlova Ves","Bratislava IV"],["Bratislava-Lamač","Bratislava IV"],["Bratislava-Záhorská Bystrica","Bratislava IV"],["Bratislava-Čunovo","Bratislava V"],["Bratislava-Jarovce","Bratislava V"],["Bratislava-Petržalka","Bratislava V"],["Bratislava-Rusovce","Bratislava V"],["Borinka","Malacky"],["Gajary","Malacky"],["Jablonové","Malacky"],["Jakubov","Malacky"],["Kostolište","Malacky"],["Kuchyňa","Malacky"],["Láb","Malacky"],["Lozorno","Malacky"],["Malacky","Malacky"],["Malé Leváre","Malacky"],["Marianka","Malacky"],["Pernek","Malacky"],["Plavecké Podhradie","Malacky"],["Plavecký Mikuláš","Malacky"],["Plavecký Štvrtok","Malacky"],["Rohožník","Malacky"],["Sološnica","Malacky"],["Studienka","Malacky"],["Stupava","Malacky"],["Suchohrad","Malacky"],["Veľké Leváre","Malacky"],["Vysoká pri Morave","Malacky"],["Záhorie (vojen.obvod)","Malacky"],["Záhorská Ves","Malacky"],["Závod","Malacky"],["Zohor","Malacky"],["Báhoň","Pezinok"],["Budmerice","Pezinok"],["Častá","Pezinok"],["Doľany","Pezinok"],["Dubová","Pezinok"],["Jablonec","Pezinok"],["Limbach","Pezinok"],["Modra","Pezinok"],["Pezinok","Pezinok"],["Píla","Pezinok"],["Slovenský Grob","Pezinok"],["Svätý Jur","Pezinok"],["Šenkvice","Pezinok"],["Štefanová","Pezinok"],["Viničné","Pezinok"],["Vinosady","Pezinok"],["Vištuk","Pezinok"],["Bernolákovo","Senec"],["Blatné","Senec"],["Boldog","Senec"],["Chorvátsky Grob","Senec"],["Čataj","Senec"],["Dunajská Lužná","Senec"],["Hamuliakovo","Senec"],["Hrubá Borša","Senec"],["Hrubý Šúr","Senec"],["Hurbanova Ves","Senec"],["Igram","Senec"],["Ivanka pri Dunaji","Senec"],["Kalinkovo","Senec"],["Kaplna","Senec"],["Kostolná pri Dunaji","Senec"],["Kráľová pri Senci","Senec"],["Malinovo","Senec"],["Miloslavov","Senec"],["Most pri Bratislave","Senec"],["Nová Dedinka","Senec"],["Nový Svet","Senec"],["Reca","Senec"],["Rovinka","Senec"],["Senec","Senec"],["Tomášov","Senec"],["Tureň","Senec"],["Veľký Biel","Senec"],["Vlky","Senec"],["Zálesie","Senec"],["Báč","Dunajská Streda"],["Baka","Dunajská Streda"],["Baloň","Dunajská Streda"],["Bellova Ves","Dunajská Streda"],["Blahová","Dunajská Streda"],["Blatná na Ostrove","Dunajská Streda"],["Bodíky","Dunajská Streda"],["Boheľov","Dunajská Streda"],["Čakany","Dunajská Streda"],["Čenkovce","Dunajská Streda"],["Čiližská Radvaň","Dunajská Streda"],["Dobrohošť","Dunajská Streda"],["Dolný Bar","Dunajská Streda"],["Dolný Štál","Dunajská Streda"],["Dunajská Streda","Dunajská Streda"],["Dunajský Klátov","Dunajská Streda"],["Gabčíkovo","Dunajská Streda"],["Holice","Dunajská Streda"],["Horná Potôň","Dunajská Streda"],["Horné Mýto","Dunajská Streda"],["Horný Bar","Dunajská Streda"],["Hubice","Dunajská Streda"],["Hviezdoslavov","Dunajská Streda"],["Jahodná","Dunajská Streda"],["Janíky","Dunajská Streda"],["Jurová","Dunajská Streda"],["Kľúčovec","Dunajská Streda"],["Kostolné Kračany","Dunajská Streda"],["Kráľovičove Kračany","Dunajská Streda"],["Kútniky","Dunajská Streda"],["Kvetoslavov","Dunajská Streda"],["Kyselica","Dunajská Streda"],["Lehnice","Dunajská Streda"],["Lúč na Ostrove","Dunajská Streda"],["Macov","Dunajská Streda"],["Mad","Dunajská Streda"],["Malé Dvorníky","Dunajská Streda"],["Medveďov","Dunajská Streda"],["Michal na Ostrove","Dunajská Streda"],["Mierovo","Dunajská Streda"],["Ňárad","Dunajská Streda"],["Nový Život","Dunajská Streda"],["Ohrady","Dunajská Streda"],["Okoč","Dunajská Streda"],["Oľdza","Dunajská Streda"],["Orechová Potôň","Dunajská Streda"],["Padáň","Dunajská Streda"],["Pataš","Dunajská Streda"],["Potônske Lúky","Dunajská Streda"],["Povoda","Dunajská Streda"],["Rohovce","Dunajská Streda"],["Sap","Dunajská Streda"],["Šamorín","Dunajská Streda"],["Štvrtok na Ostrove","Dunajská Streda"],["Topoľníky","Dunajská Streda"],["Trhová Hradská","Dunajská Streda"],["Trnávka","Dunajská Streda"],["Trstená na Ostrove","Dunajská Streda"],["Veľká Paka","Dunajská Streda"],["Veľké Blahovo","Dunajská Streda"],["Veľké Dvorníky","Dunajská Streda"],["Veľký Meder","Dunajská Streda"],["Vieska","Dunajská Streda"],["Vojka nad Dunajom","Dunajská Streda"],["Vrakúň","Dunajská Streda"],["Vydrany","Dunajská Streda"],["Zlaté Klasy","Dunajská Streda"],["Abrahám","Galanta"],["Čierna Voda","Galanta"],["Čierny Brod","Galanta"],["Dolná Streda","Galanta"],["Dolné Saliby","Galanta"],["Dolný Chotár","Galanta"],["Galanta","Galanta"],["Gáň","Galanta"],["Horné Saliby","Galanta"],["Hoste","Galanta"],["Jánovce","Galanta"],["Jelka","Galanta"],["Kajal","Galanta"],["Košúty","Galanta"],["Kráľov Brod","Galanta"],["Malá Mača","Galanta"],["Matúškovo","Galanta"],["Mostová","Galanta"],["Pata","Galanta"],["Pusté Sady","Galanta"],["Pusté Úľany","Galanta"],["Sereď","Galanta"],["Sládkovičovo","Galanta"],["Šalgočka","Galanta"],["Šintava","Galanta"],["Šoporňa","Galanta"],["Tomášikovo","Galanta"],["Topoľnica","Galanta"],["Trstice","Galanta"],["Váhovce","Galanta"],["Veľká Mača","Galanta"],["Veľké Úľany","Galanta"],["Veľký Grob","Galanta"],["Vinohrady nad Váhom","Galanta"],["Vozokany","Galanta"],["Zemianske Sady","Galanta"],["Bojničky","Hlohovec"],["Červeník","Hlohovec"],["Dolné Otrokovce","Hlohovec"],["Dolné Trhovište","Hlohovec"],["Dolné Zelenice","Hlohovec"],["Dvorníky","Hlohovec"],["Hlohovec","Hlohovec"],["Horné Otrokovce","Hlohovec"],["Horné Trhovište","Hlohovec"],["Horné Zelenice","Hlohovec"],["Jalšové","Hlohovec"],["Kľačany","Hlohovec"],["Koplotovce","Hlohovec"],["Leopoldov","Hlohovec"],["Madunice","Hlohovec"],["Merašice","Hlohovec"],["Pastuchov","Hlohovec"],["Ratkovce","Hlohovec"],["Sasinkovo","Hlohovec"],["Siladice","Hlohovec"],["Tekolďany","Hlohovec"],["Tepličky","Hlohovec"],["Trakovice","Hlohovec"],["Žlkovce","Hlohovec"],["Banka","Piešťany"],["Bašovce","Piešťany"],["Borovce","Piešťany"],["Chtelnica","Piešťany"],["Dolný Lopašov","Piešťany"],["Drahovce","Piešťany"],["Dubovany","Piešťany"],["Ducové","Piešťany"],["Hubina","Piešťany"],["Kočín-Lančár","Piešťany"],["Krakovany","Piešťany"],["Moravany nad Váhom","Piešťany"],["Nižná","Piešťany"],["Ostrov","Piešťany"],["Pečeňady","Piešťany"],["Piešťany","Piešťany"],["Prašník","Piešťany"],["Rakovice","Piešťany"],["Ratnovce","Piešťany"],["Sokolovce","Piešťany"],["Šípkové","Piešťany"],["Šterusy","Piešťany"],["Trebatice","Piešťany"],["Veľké Kostoľany","Piešťany"],["Veľké Orvište","Piešťany"],["Veselé","Piešťany"],["Vrbové","Piešťany"],["Bílkove Humence","Senica"],["Borský Mikuláš","Senica"],["Borský Svätý Jur","Senica"],["Cerová","Senica"],["Čáry","Senica"],["Častkov","Senica"],["Dojč","Senica"],["Hlboké","Senica"],["Hradište pod Vrátnom","Senica"],["Jablonica","Senica"],["Koválov","Senica"],["Kuklov","Senica"],["Kúty","Senica"],["Lakšárska Nová Ves","Senica"],["Moravský Svätý Ján","Senica"],["Osuské","Senica"],["Plavecký Peter","Senica"],["Podbranč","Senica"],["Prietrž","Senica"],["Prievaly","Senica"],["Rohov","Senica"],["Rovensko","Senica"],["Rybky","Senica"],["Sekule","Senica"],["Senica","Senica"],["Smolinské","Senica"],["Smrdáky","Senica"],["Sobotište","Senica"],["Šajdíkove Humence","Senica"],["Šaštín-Stráže","Senica"],["Štefanov","Senica"],["Brodské","Skalica"],["Chropov","Skalica"],["Dubovce","Skalica"],["Gbely","Skalica"],["Holíč","Skalica"],["Kátov","Skalica"],["Kopčany","Skalica"],["Koválovec","Skalica"],["Letničie","Skalica"],["Lopašov","Skalica"],["Mokrý Háj","Skalica"],["Oreské","Skalica"],["Petrova Ves","Skalica"],["Popudinské Močidľany","Skalica"],["Prietržka","Skalica"],["Radimov","Skalica"],["Radošovce","Skalica"],["Skalica","Skalica"],["Trnovec","Skalica"],["Unín","Skalica"],["Vrádište","Skalica"],["Biely Kostol","Trnava"],["Bíňovce","Trnava"],["Bohdanovce nad Trnavou","Trnava"],["Boleráz","Trnava"],["Borová","Trnava"],["Brestovany","Trnava"],["Bučany","Trnava"],["Buková","Trnava"],["Cífer","Trnava"],["Dechtice","Trnava"],["Dlhá","Trnava"],["Dobrá Voda","Trnava"],["Dolná Krupá","Trnava"],["Dolné Dubové","Trnava"],["Dolné Lovčice","Trnava"],["Dolné Orešany","Trnava"],["Horná Krupá","Trnava"],["Horné Dubové","Trnava"],["Horné Orešany","Trnava"],["Hrnčiarovce nad Parnou","Trnava"],["Jaslovské Bohunice","Trnava"],["Kátlovce","Trnava"],["Košolná","Trnava"],["Križovany nad Dudváhom","Trnava"],["Lošonec","Trnava"],["Majcichov","Trnava"],["Malženice","Trnava"],["Naháč","Trnava"],["Opoj","Trnava"],["Pavlice","Trnava"],["Radošovce","Trnava"],["Ružindol","Trnava"],["Slovenská Nová Ves","Trnava"],["Smolenice","Trnava"],["Suchá nad Parnou","Trnava"],["Šelpice","Trnava"],["Špačince","Trnava"],["Šúrovce","Trnava"],["Trnava","Trnava"],["Trstín","Trnava"],["Vlčkovce","Trnava"],["Voderady","Trnava"],["Zavar","Trnava"],["Zeleneč","Trnava"],["Zvončín","Trnava"],["Bánovce nad Bebravou","Bánovce nad Bebravou"],["Borčany","Bánovce nad Bebravou"],["Brezolupy","Bánovce nad Bebravou"],["Chudá Lehota","Bánovce nad Bebravou"],["Cimenná","Bánovce nad Bebravou"],["Čierna Lehota","Bánovce nad Bebravou"],["Dežerice","Bánovce nad Bebravou"],["Dolné Naštice","Bánovce nad Bebravou"],["Dubnička","Bánovce nad Bebravou"],["Dvorec","Bánovce nad Bebravou"],["Haláčovce","Bánovce nad Bebravou"],["Horné Naštice","Bánovce nad Bebravou"],["Krásna Ves","Bánovce nad Bebravou"],["Kšinná","Bánovce nad Bebravou"],["Libichava","Bánovce nad Bebravou"],["Ľutov","Bánovce nad Bebravou"],["Malá Hradná","Bánovce nad Bebravou"],["Malé Hoste","Bánovce nad Bebravou"],["Miezgovce","Bánovce nad Bebravou"],["Nedašovce","Bánovce nad Bebravou"],["Omastiná","Bánovce nad Bebravou"],["Otrhánky","Bánovce nad Bebravou"],["Pečeňany","Bánovce nad Bebravou"],["Pochabany","Bánovce nad Bebravou"],["Podlužany","Bánovce nad Bebravou"],["Pravotice","Bánovce nad Bebravou"],["Prusy","Bánovce nad Bebravou"],["Ruskovce","Bánovce nad Bebravou"],["Rybany","Bánovce nad Bebravou"],["Slatina nad Bebravou","Bánovce nad Bebravou"],["Slatinka nad Bebravou","Bánovce nad Bebravou"],["Šípkov","Bánovce nad Bebravou"],["Šišov","Bánovce nad Bebravou"],["Timoradza","Bánovce nad Bebravou"],["Trebichava","Bánovce nad Bebravou"],["Uhrovec","Bánovce nad Bebravou"],["Uhrovské Podhradie","Bánovce nad Bebravou"],["Veľké Chlievany","Bánovce nad Bebravou"],["Veľké Držkovce","Bánovce nad Bebravou"],["Veľké Hoste","Bánovce nad Bebravou"],["Vysočany","Bánovce nad Bebravou"],["Zlatníky","Bánovce nad Bebravou"],["Žitná-Radiša","Bánovce nad Bebravou"],["Bošany","Partizánske"],["Brodzany","Partizánske"],["Chynorany","Partizánske"],["Hradište","Partizánske"],["Ješkova Ves","Partizánske"],["Klátova Nová Ves","Partizánske"],["Kolačno","Partizánske"],["Krásno","Partizánske"],["Livina","Partizánske"],["Livinské Opatovce","Partizánske"],["Malé Kršteňany","Partizánske"],["Malé Uherce","Partizánske"],["Nadlice","Partizánske"],["Nedanovce","Partizánske"],["Ostratice","Partizánske"],["Partizánske","Partizánske"],["Pažiť","Partizánske"],["Skačany","Partizánske"],["Turčianky","Partizánske"],["Veľké Kršteňany","Partizánske"],["Veľké Uherce","Partizánske"],["Veľký Klíž","Partizánske"],["Žabokreky nad Nitrou","Partizánske"],["Brestovec","Myjava"],["Brezová pod Bradlom","Myjava"],["Bukovec","Myjava"],["Chvojnica","Myjava"],["Hrašné","Myjava"],["Jablonka","Myjava"],["Kostolné","Myjava"],["Košariská","Myjava"],["Krajné","Myjava"],["Myjava","Myjava"],["Podkylava","Myjava"],["Polianka","Myjava"],["Poriadie","Myjava"],["Priepasné","Myjava"],["Rudník","Myjava"],["Stará Myjava","Myjava"],["Vrbovce","Myjava"],["Beckov","Nové Mesto nad Váhom"],["Bošáca","Nové Mesto nad Váhom"],["Brunovce","Nové Mesto nad Váhom"],["Bzince pod Javorinou","Nové Mesto nad Váhom"],["Čachtice","Nové Mesto nad Váhom"],["Častkovce","Nové Mesto nad Váhom"],["Dolné Srnie","Nové Mesto nad Váhom"],["Haluzice","Nové Mesto nad Váhom"],["Hôrka nad Váhom","Nové Mesto nad Váhom"],["Horná Streda","Nové Mesto nad Váhom"],["Hrachovište","Nové Mesto nad Váhom"],["Hrádok","Nové Mesto nad Váhom"],["Kálnica","Nové Mesto nad Váhom"],["Kočovce","Nové Mesto nad Váhom"],["Lubina","Nové Mesto nad Váhom"],["Lúka","Nové Mesto nad Váhom"],["Modrová","Nové Mesto nad Váhom"],["Modrovka","Nové Mesto nad Váhom"],["Moravské Lieskové","Nové Mesto nad Váhom"],["Nová Bošáca","Nové Mesto nad Váhom"],["Nová Lehota","Nové Mesto nad Váhom"],["Nová Ves nad Váhom","Nové Mesto nad Váhom"],["Nové Mesto nad Váhom","Nové Mesto nad Váhom"],["Očkov","Nové Mesto nad Váhom"],["Pobedim","Nové Mesto nad Váhom"],["Podolie","Nové Mesto nad Váhom"],["Potvorice","Nové Mesto nad Váhom"],["Považany","Nové Mesto nad Váhom"],["Stará Lehota","Nové Mesto nad Váhom"],["Stará Turá","Nové Mesto nad Váhom"],["Trenčianske Bohuslavice","Nové Mesto nad Váhom"],["Vaďovce","Nové Mesto nad Váhom"],["Višňové","Nové Mesto nad Váhom"],["Zemianske Podhradie","Nové Mesto nad Váhom"],["Bodiná","Považská Bystrica"],["Brvnište","Považská Bystrica"],["Čelkova Lehota","Považská Bystrica"],["Dolná Mariková","Považská Bystrica"],["Dolný Lieskov","Považská Bystrica"],["Domaniža","Považská Bystrica"],["Ďurďové","Považská Bystrica"],["Hatné","Považská Bystrica"],["Horná Mariková","Považská Bystrica"],["Horný Lieskov","Považská Bystrica"],["Jasenica","Považská Bystrica"],["Klieština","Považská Bystrica"],["Kostolec","Považská Bystrica"],["Malé Lednice","Považská Bystrica"],["Papradno","Považská Bystrica"],["Plevník-Drienové","Považská Bystrica"],["Počarová","Považská Bystrica"],["Podskalie","Považská Bystrica"],["Považská Bystrica","Považská Bystrica"],["Prečín","Považská Bystrica"],["Pružina","Považská Bystrica"],["Sádočné","Považská Bystrica"],["Slopná","Považská Bystrica"],["Stupné","Považská Bystrica"],["Sverepec","Považská Bystrica"],["Udiča","Považská Bystrica"],["Vrchteplá","Považská Bystrica"],["Záskalie","Považská Bystrica"],["Beluša","Púchov"],["Dohňany","Púchov"],["Dolná Breznica","Púchov"],["Dolné Kočkovce","Púchov"],["Horná Breznica","Púchov"],["Horovce","Púchov"],["Kvašov","Púchov"],["Lazy pod Makytou","Púchov"],["Lednica","Púchov"],["Lednické Rovne","Púchov"],["Lúky","Púchov"],["Lysá pod Makytou","Púchov"],["Mestečko","Púchov"],["Mojtín","Púchov"],["Nimnica","Púchov"],["Púchov","Púchov"],["Streženice","Púchov"],["Visolaje","Púchov"],["Vydrná","Púchov"],["Záriečie","Púchov"],["Zubák","Púchov"],["Bojnice","Prievidza"],["Bystričany","Prievidza"],["Chrenovec-Brusno","Prievidza"],["Chvojnica","Prievidza"],["Cigeľ","Prievidza"],["Čavoj","Prievidza"],["Čereňany","Prievidza"],["Diviacka Nová Ves","Prievidza"],["Diviaky nad Nitricou","Prievidza"],["Dlžín","Prievidza"],["Dolné Vestenice","Prievidza"],["Handlová","Prievidza"],["Horná Ves","Prievidza"],["Horné Vestenice","Prievidza"],["Jalovec","Prievidza"],["Kamenec pod Vtáčnikom","Prievidza"],["Kanianka","Prievidza"],["Kľačno","Prievidza"],["Kocurany","Prievidza"],["Kostolná Ves","Prievidza"],["Koš","Prievidza"],["Lazany","Prievidza"],["Lehota pod Vtáčnikom","Prievidza"],["Liešťany","Prievidza"],["Lipník","Prievidza"],["Malá Čausa","Prievidza"],["Malinová","Prievidza"],["Nedožery-Brezany","Prievidza"],["Nevidzany","Prievidza"],["Nitrianske Pravno","Prievidza"],["Nitrianske Rudno","Prievidza"],["Nitrianske Sučany","Prievidza"],["Nitrica","Prievidza"],["Nováky","Prievidza"],["Opatovce nad Nitrou","Prievidza"],["Oslany","Prievidza"],["Podhradie","Prievidza"],["Poluvsie","Prievidza"],["Poruba","Prievidza"],["Pravenec","Prievidza"],["Prievidza","Prievidza"],["Radobica","Prievidza"],["Ráztočno","Prievidza"],["Rudnianska Lehota","Prievidza"],["Sebedražie","Prievidza"],["Seč","Prievidza"],["Šútovce","Prievidza"],["Temeš","Prievidza"],["Tužina","Prievidza"],["Valaská Belá","Prievidza"],["Veľká Čausa","Prievidza"],["Zemianske Kostoľany","Prievidza"],["Bohunice","Ilava"],["Bolešov","Ilava"],["Borčice","Ilava"],["Červený Kameň","Ilava"],["Dubnica nad Váhom","Ilava"],["Dulov","Ilava"],["Horná Poruba","Ilava"],["Ilava","Ilava"],["Kameničany","Ilava"],["Košeca","Ilava"],["Košecké Podhradie","Ilava"],["Krivoklát","Ilava"],["Ladce","Ilava"],["Mikušovce","Ilava"],["Nová Dubnica","Ilava"],["Pruské","Ilava"],["Sedmerovec","Ilava"],["Slavnica","Ilava"],["Tuchyňa","Ilava"],["Vršatské Podhradie","Ilava"],["Zliechov","Ilava"],["Adamovské Kochanovce","Trenčín"],["Bobot","Trenčín"],["Chocholná-Velčice","Trenčín"],["Dolná Poruba","Trenčín"],["Dolná Súča","Trenčín"],["Drietoma","Trenčín"],["Dubodiel","Trenčín"],["Horná Súča","Trenčín"],["Horňany","Trenčín"],["Horné Srnie","Trenčín"],["Hrabovka","Trenčín"],["Ivanovce","Trenčín"],["Kostolná-Záriečie","Trenčín"],["Krivosúd-Bodovka","Trenčín"],["Melčice-Lieskové","Trenčín"],["Mníchova Lehota","Trenčín"],["Motešice","Trenčín"],["Nemšová","Trenčín"],["Neporadza","Trenčín"],["Omšenie","Trenčín"],["Opatovce","Trenčín"],["Petrova Lehota","Trenčín"],["Selec","Trenčín"],["Skalka nad Váhom","Trenčín"],["Soblahov","Trenčín"],["Svinná","Trenčín"],["Štvrtok","Trenčín"],["Trenčianska Teplá","Trenčín"],["Trenčianska Turná","Trenčín"],["Trenčianske Jastrabie","Trenčín"],["Trenčianske Mitice","Trenčín"],["Trenčianske Stankovce","Trenčín"],["Trenčianske Teplice","Trenčín"],["Trenčín","Trenčín"],["Veľká Hradná","Trenčín"],["Veľké Bierovce","Trenčín"],["Zamarovce","Trenčín"],["Bajč","Komárno"],["Bátorove Kosihy","Komárno"],["Bodza","Komárno"],["Bodzianske Lúky","Komárno"],["Brestovec","Komárno"],["Búč","Komárno"],["Chotín","Komárno"],["Čalovec","Komárno"],["Číčov","Komárno"],["Dedina Mládeže","Komárno"],["Dulovce","Komárno"],["Holiare","Komárno"],["Hurbanovo","Komárno"],["Imeľ","Komárno"],["Iža","Komárno"],["Kameničná","Komárno"],["Klížska Nemá","Komárno"],["Kolárovo","Komárno"],["Komárno","Komárno"],["Kravany nad Dunajom","Komárno"],["Lipové","Komárno"],["Marcelová","Komárno"],["Martovce","Komárno"],["Moča","Komárno"],["Modrany","Komárno"],["Mudroňovo","Komárno"],["Nesvady","Komárno"],["Okoličná na Ostrove","Komárno"],["Patince","Komárno"],["Pribeta","Komárno"],["Radvaň nad Dunajom","Komárno"],["Sokolce","Komárno"],["Svätý Peter","Komárno"],["Šrobárová","Komárno"],["Tôň","Komárno"],["Trávnik","Komárno"],["Veľké Kosihy","Komárno"],["Virt","Komárno"],["Vrbová nad Váhom","Komárno"],["Zemianska Olča","Komárno"],["Zlatná na Ostrove","Komárno"],["Bajka","Levice"],["Bátovce","Levice"],["Beša","Levice"],["Bielovce","Levice"],["Bohunice","Levice"],["Bory","Levice"],["Brhlovce","Levice"],["Čajkov","Levice"],["Čaka","Levice"],["Čata","Levice"],["Demandice","Levice"],["Devičany","Levice"],["Dolná Seč","Levice"],["Dolné Semerovce","Levice"],["Dolný Pial","Levice"],["Domadice","Levice"],["Drženice","Levice"],["Farná","Levice"],["Hokovce","Levice"],["Hontianska Vrbica","Levice"],["Hontianske Trsťany","Levice"],["Horná Seč","Levice"],["Horné Semerovce","Levice"],["Horné Turovce","Levice"],["Horný Pial","Levice"],["Hrkovce","Levice"],["Hronovce","Levice"],["Hronské Kľačany","Levice"],["Hronské Kosihy","Levice"],["Iňa","Levice"],["Ipeľské Úľany","Levice"],["Ipeľský Sokolec","Levice"],["Jabloňovce","Levice"],["Jesenské","Levice"],["Jur nad Hronom","Levice"],["Kalná nad Hronom","Levice"],["Keť","Levice"],["Kozárovce","Levice"],["Krškany","Levice"],["Kubáňovo","Levice"],["Kukučínov","Levice"],["Kuraľany","Levice"],["Levice","Levice"],["Lok","Levice"],["Lontov","Levice"],["Lula","Levice"],["Málaš","Levice"],["Malé Kozmálovce","Levice"],["Malé Ludince","Levice"],["Mýtne Ludany","Levice"],["Nová Dedina","Levice"],["Nový Tekov","Levice"],["Nýrovce","Levice"],["Ondrejovce","Levice"],["Pastovce","Levice"],["Pečenice","Levice"],["Plášťovce","Levice"],["Plavé Vozokany","Levice"],["Podlužany","Levice"],["Pohronský Ruskov","Levice"],["Pukanec","Levice"],["Rybník","Levice"],["Santovka","Levice"],["Sazdice","Levice"],["Sikenica","Levice"],["Slatina","Levice"],["Starý Hrádok","Levice"],["Starý Tekov","Levice"],["Šahy","Levice"],["Šalov","Levice"],["Šarovce","Levice"],["Tehla","Levice"],["Tekovské Lužany","Levice"],["Tekovský Hrádok","Levice"],["Tlmače","Levice"],["Tupá","Levice"],["Turá","Levice"],["Uhliská","Levice"],["Veľké Kozmálovce","Levice"],["Veľké Ludince","Levice"],["Veľké Turovce","Levice"],["Veľký Ďur","Levice"],["Vyškovce nad Ipľom","Levice"],["Vyšné nad Hronom","Levice"],["Zalaba","Levice"],["Zbrojníky","Levice"],["Želiezovce","Levice"],["Žemberovce","Levice"],["Žemliare","Levice"],["Alekšince","Nitra"],["Báb","Nitra"],["Babindol","Nitra"],["Bádice","Nitra"],["Branč","Nitra"],["Cabaj-Čápor","Nitra"],["Čab","Nitra"],["Čakajovce","Nitra"],["Čechynce","Nitra"],["Čeľadice","Nitra"],["Čifáre","Nitra"],["Dolné Lefantovce","Nitra"],["Dolné Obdokovce","Nitra"],["Golianovo","Nitra"],["Horné Lefantovce","Nitra"],["Hosťová","Nitra"],["Hruboňovo","Nitra"],["Ivanka pri Nitre","Nitra"],["Jarok","Nitra"],["Jelenec","Nitra"],["Jelšovce","Nitra"],["Kapince","Nitra"],["Klasov","Nitra"],["Kolíňany","Nitra"],["Lehota","Nitra"],["Lúčnica nad Žitavou","Nitra"],["Ľudovítová","Nitra"],["Lukáčovce","Nitra"],["Lužianky","Nitra"],["Malé Chyndice","Nitra"],["Malé Zálužie","Nitra"],["Malý Cetín","Nitra"],["Malý Lapáš","Nitra"],["Melek","Nitra"],["Mojmírovce","Nitra"],["Nitra","Nitra"],["Nitrianske Hrnčiarovce","Nitra"],["Nová Ves nad Žitavou","Nitra"],["Nové Sady","Nitra"],["Paňa","Nitra"],["Podhorany","Nitra"],["Pohranice","Nitra"],["Poľný Kesov","Nitra"],["Rišňovce","Nitra"],["Rumanová","Nitra"],["Svätoplukovo","Nitra"],["Štefanovičová","Nitra"],["Štitáre","Nitra"],["Šurianky","Nitra"],["Tajná","Nitra"],["Telince","Nitra"],["Veľká Dolina","Nitra"],["Veľké Chyndice","Nitra"],["Veľké Zálužie","Nitra"],["Veľký Cetín","Nitra"],["Veľký Lapáš","Nitra"],["Vinodol","Nitra"],["Vráble","Nitra"],["Výčapy-Opatovce","Nitra"],["Zbehy","Nitra"],["Žirany","Nitra"],["Žitavce","Nitra"],["Beladice","Zlaté Moravce"],["Choča","Zlaté Moravce"],["Čaradice","Zlaté Moravce"],["Červený Hrádok","Zlaté Moravce"],["Čierne Kľačany","Zlaté Moravce"],["Hostie","Zlaté Moravce"],["Hosťovce","Zlaté Moravce"],["Jedľové Kostoľany","Zlaté Moravce"],["Kostoľany pod Tribečom","Zlaté Moravce"],["Ladice","Zlaté Moravce"],["Lovce","Zlaté Moravce"],["Machulince","Zlaté Moravce"],["Malé Vozokany","Zlaté Moravce"],["Mankovce","Zlaté Moravce"],["Martin nad Žitavou","Zlaté Moravce"],["Nemčiňany","Zlaté Moravce"],["Neverice","Zlaté Moravce"],["Nevidzany","Zlaté Moravce"],["Obyce","Zlaté Moravce"],["Skýcov","Zlaté Moravce"],["Sľažany","Zlaté Moravce"],["Slepčany","Zlaté Moravce"],["Tekovské Nemce","Zlaté Moravce"],["Tesárske Mlyňany","Zlaté Moravce"],["Topoľčianky","Zlaté Moravce"],["Velčice","Zlaté Moravce"],["Veľké Vozokany","Zlaté Moravce"],["Vieska nad Žitavou","Zlaté Moravce"],["Volkovce","Zlaté Moravce"],["Zlaté Moravce","Zlaté Moravce"],["Zlatno","Zlaté Moravce"],["Žikava","Zlaté Moravce"],["Žitavany","Zlaté Moravce"],["Andovce","Nové Zámky"],["Bajtava","Nové Zámky"],["Bánov","Nové Zámky"],["Bardoňovo","Nové Zámky"],["Belá","Nové Zámky"],["Bešeňov","Nové Zámky"],["Bíňa","Nové Zámky"],["Branovo","Nové Zámky"],["Bruty","Nové Zámky"],["Chľaba","Nové Zámky"],["Čechy","Nové Zámky"],["Černík","Nové Zámky"],["Dedinka","Nové Zámky"],["Dolný Ohaj","Nové Zámky"],["Dubník","Nové Zámky"],["Dvory nad Žitavou","Nové Zámky"],["Gbelce","Nové Zámky"],["Hul","Nové Zámky"],["Jasová","Nové Zámky"],["Jatov","Nové Zámky"],["Kamenica nad Hronom","Nové Zámky"],["Kamenín","Nové Zámky"],["Kamenný Most","Nové Zámky"],["Kmeťovo","Nové Zámky"],["Kolta","Nové Zámky"],["Komjatice","Nové Zámky"],["Komoča","Nové Zámky"],["Leľa","Nové Zámky"],["Lipová","Nové Zámky"],["Ľubá","Nové Zámky"],["Malá nad Hronom","Nové Zámky"],["Malé Kosihy","Nové Zámky"],["Maňa","Nové Zámky"],["Michal nad Žitavou","Nové Zámky"],["Mojzesovo","Nové Zámky"],["Mužla","Nové Zámky"],["Nána","Nové Zámky"],["Nová Vieska","Nové Zámky"],["Nové Zámky","Nové Zámky"],["Obid","Nové Zámky"],["Palárikovo","Nové Zámky"],["Pavlová","Nové Zámky"],["Podhájska","Nové Zámky"],["Pozba","Nové Zámky"],["Radava","Nové Zámky"],["Rastislavice","Nové Zámky"],["Rúbaň","Nové Zámky"],["Salka","Nové Zámky"],["Semerovo","Nové Zámky"],["Sikenička","Nové Zámky"],["Strekov","Nové Zámky"],["Svodín","Nové Zámky"],["Šarkan","Nové Zámky"],["Štúrovo","Nové Zámky"],["Šurany","Nové Zámky"],["Trávnica","Nové Zámky"],["Tvrdošovce","Nové Zámky"],["Úľany nad Žitavou","Nové Zámky"],["Veľké Lovce","Nové Zámky"],["Veľký Kýr","Nové Zámky"],["Vlkas","Nové Zámky"],["Zemné","Nové Zámky"],["Diakovce","Šaľa"],["Dlhá nad Váhom","Šaľa"],["Hájske","Šaľa"],["Horná Kráľová","Šaľa"],["Kráľová nad Váhom","Šaľa"],["Močenok","Šaľa"],["Neded","Šaľa"],["Selice","Šaľa"],["Šaľa","Šaľa"],["Tešedíkovo","Šaľa"],["Trnovec nad Váhom","Šaľa"],["Vlčany","Šaľa"],["Žihárec","Šaľa"],["Ardanovce","Topoľčany"],["Belince","Topoľčany"],["Biskupová","Topoľčany"],["Blesovce","Topoľčany"],["Bojná","Topoľčany"],["Chrabrany","Topoľčany"],["Čeľadince","Topoľčany"],["Čermany","Topoľčany"],["Dvorany nad Nitrou","Topoľčany"],["Hajná Nová Ves","Topoľčany"],["Horné Chlebany","Topoľčany"],["Horné Obdokovce","Topoľčany"],["Horné Štitáre","Topoľčany"],["Hrušovany","Topoľčany"],["Jacovce","Topoľčany"],["Kamanová","Topoľčany"],["Koniarovce","Topoľčany"],["Kovarce","Topoľčany"],["Krnča","Topoľčany"],["Krtovce","Topoľčany"],["Krušovce","Topoľčany"],["Kuzmice","Topoľčany"],["Lipovník","Topoľčany"],["Ludanice","Topoľčany"],["Lužany","Topoľčany"],["Malé Ripňany","Topoľčany"],["Nemčice","Topoľčany"],["Nemečky","Topoľčany"],["Nitrianska Blatnica","Topoľčany"],["Nitrianska Streda","Topoľčany"],["Norovce","Topoľčany"],["Oponice","Topoľčany"],["Orešany","Topoľčany"],["Podhradie","Topoľčany"],["Prašice","Topoľčany"],["Práznovce","Topoľčany"],["Preseľany","Topoľčany"],["Radošina","Topoľčany"],["Rajčany","Topoľčany"],["Solčany","Topoľčany"],["Solčianky","Topoľčany"],["Súlovce","Topoľčany"],["Svrbice","Topoľčany"],["Šalgovce","Topoľčany"],["Tesáre","Topoľčany"],["Topoľčany","Topoľčany"],["Tovarníky","Topoľčany"],["Tvrdomestice","Topoľčany"],["Urmince","Topoľčany"],["Veľké Dvorany","Topoľčany"],["Veľké Ripňany","Topoľčany"],["Velušovce","Topoľčany"],["Vozokany","Topoľčany"],["Závada","Topoľčany"],["Čadca","Čadca"],["Čierne","Čadca"],["Dlhá nad Kysucou","Čadca"],["Dunajov","Čadca"],["Klokočov","Čadca"],["Klubina","Čadca"],["Korňa","Čadca"],["Krásno nad Kysucou","Čadca"],["Makov","Čadca"],["Nová Bystrica","Čadca"],["Olešná","Čadca"],["Oščadnica","Čadca"],["Podvysoká","Čadca"],["Radôstka","Čadca"],["Raková","Čadca"],["Skalité","Čadca"],["Stará Bystrica","Čadca"],["Staškov","Čadca"],["Svrčinovec","Čadca"],["Turzovka","Čadca"],["Vysoká nad Kysucou","Čadca"],["Zákopčie","Čadca"],["Zborov nad Bystricou","Čadca"],["Bziny","Dolný Kubín"],["Chlebnice","Dolný Kubín"],["Dlhá nad Oravou","Dolný Kubín"],["Dolný Kubín","Dolný Kubín"],["Horná Lehota","Dolný Kubín"],["Istebné","Dolný Kubín"],["Jasenová","Dolný Kubín"],["Kraľovany","Dolný Kubín"],["Krivá","Dolný Kubín"],["Leštiny","Dolný Kubín"],["Malatiná","Dolný Kubín"],["Medzibrodie nad Oravou","Dolný Kubín"],["Oravská Poruba","Dolný Kubín"],["Oravský Podzámok","Dolný Kubín"],["Osádka","Dolný Kubín"],["Párnica","Dolný Kubín"],["Pokryváč","Dolný Kubín"],["Pribiš","Dolný Kubín"],["Pucov","Dolný Kubín"],["Sedliacka Dubová","Dolný Kubín"],["Veličná","Dolný Kubín"],["Vyšný Kubín","Dolný Kubín"],["Zázrivá","Dolný Kubín"],["Žaškov","Dolný Kubín"],["Babín","Námestovo"],["Beňadovo","Námestovo"],["Bobrov","Námestovo"],["Breza","Námestovo"],["Hruštín","Námestovo"],["Klin","Námestovo"],["Krušetnica","Námestovo"],["Lokca","Námestovo"],["Lomná","Námestovo"],["Mútne","Námestovo"],["Námestovo","Námestovo"],["Novoť","Námestovo"],["Oravská Jasenica","Námestovo"],["Oravská Lesná","Námestovo"],["Oravská Polhora","Námestovo"],["Oravské Veselé","Námestovo"],["Rabča","Námestovo"],["Rabčice","Námestovo"],["Sihelné","Námestovo"],["Ťapešovo","Námestovo"],["Vasiľov","Námestovo"],["Vavrečka","Námestovo"],["Zákamenné","Námestovo"],["Zubrohlava","Námestovo"],["Brezovica","Tvrdošín"],["Čimhová","Tvrdošín"],["Habovka","Tvrdošín"],["Hladovka","Tvrdošín"],["Liesek","Tvrdošín"],["Nižná","Tvrdošín"],["Oravský Biely Potok","Tvrdošín"],["Podbiel","Tvrdošín"],["Suchá Hora","Tvrdošín"],["Štefanov nad Oravou","Tvrdošín"],["Trstená","Tvrdošín"],["Tvrdošín","Tvrdošín"],["Vitanová","Tvrdošín"],["Zábiedovo","Tvrdošín"],["Zuberec","Tvrdošín"],["Beňadiková","Liptovský Mikuláš"],["Bobrovček","Liptovský Mikuláš"],["Bobrovec","Liptovský Mikuláš"],["Bobrovník","Liptovský Mikuláš"],["Bukovina","Liptovský Mikuláš"],["Demänovská Dolina","Liptovský Mikuláš"],["Dúbrava","Liptovský Mikuláš"],["Galovany","Liptovský Mikuláš"],["Gôtovany","Liptovský Mikuláš"],["Huty","Liptovský Mikuláš"],["Hybe","Liptovský Mikuláš"],["Ižipovce","Liptovský Mikuláš"],["Jakubovany","Liptovský Mikuláš"],["Jalovec","Liptovský Mikuláš"],["Jamník","Liptovský Mikuláš"],["Konská","Liptovský Mikuláš"],["Kráľova Lehota","Liptovský Mikuláš"],["Kvačany","Liptovský Mikuláš"],["Lazisko","Liptovský Mikuláš"],["Liptovská Anna","Liptovský Mikuláš"],["Liptovská Kokava","Liptovský Mikuláš"],["Liptovská Porúbka","Liptovský Mikuláš"],["Liptovská Sielnica","Liptovský Mikuláš"],["Liptovské Beharovce","Liptovský Mikuláš"],["Liptovské Kľačany","Liptovský Mikuláš"],["Liptovské Matiašovce","Liptovský Mikuláš"],["Liptovský Hrádok","Liptovský Mikuláš"],["Liptovský Ján","Liptovský Mikuláš"],["Liptovský Mikuláš","Liptovský Mikuláš"],["Liptovský Ondrej","Liptovský Mikuláš"],["Liptovský Peter","Liptovský Mikuláš"],["Liptovský Trnovec","Liptovský Mikuláš"],["Ľubeľa","Liptovský Mikuláš"],["Malatíny","Liptovský Mikuláš"],["Malé Borové","Liptovský Mikuláš"],["Malužiná","Liptovský Mikuláš"],["Nižná Boca","Liptovský Mikuláš"],["Partizánska Ľupča","Liptovský Mikuláš"],["Pavčina Lehota","Liptovský Mikuláš"],["Pavlova Ves","Liptovský Mikuláš"],["Podtureň","Liptovský Mikuláš"],["Pribylina","Liptovský Mikuláš"],["Prosiek","Liptovský Mikuláš"],["Smrečany","Liptovský Mikuláš"],["Svätý Kríž","Liptovský Mikuláš"],["Trstené","Liptovský Mikuláš"],["Uhorská Ves","Liptovský Mikuláš"],["Vavrišovo","Liptovský Mikuláš"],["Važec","Liptovský Mikuláš"],["Veľké Borové","Liptovský Mikuláš"],["Veterná Poruba","Liptovský Mikuláš"],["Vlachy","Liptovský Mikuláš"],["Východná","Liptovský Mikuláš"],["Vyšná Boca","Liptovský Mikuláš"],["Závažná Poruba","Liptovský Mikuláš"],["Žiar","Liptovský Mikuláš"],["Belá-Dulice","Martin"],["Benice","Martin"],["Blatnica","Martin"],["Bystrička","Martin"],["Ďanová","Martin"],["Diaková","Martin"],["Dolný Kalník","Martin"],["Dražkovce","Martin"],["Folkušová","Martin"],["Horný Kalník","Martin"],["Karlová","Martin"],["Kláštor pod Znievom","Martin"],["Košťany nad Turcom","Martin"],["Krpeľany","Martin"],["Laskár","Martin"],["Ležiachov","Martin"],["Lipovec","Martin"],["Martin","Martin"],["Necpaly","Martin"],["Nolčovo","Martin"],["Podhradie","Martin"],["Príbovce","Martin"],["Rakovo","Martin"],["Ratkovo","Martin"],["Sklabiňa","Martin"],["Sklabinský Podzámok","Martin"],["Slovany","Martin"],["Socovce","Martin"],["Sučany","Martin"],["Šútovo","Martin"],["Trebostovo","Martin"],["Trnovo","Martin"],["Turany","Martin"],["Turčianska Štiavnička","Martin"],["Turčianske Jaseno","Martin"],["Turčianske Kľačany","Martin"],["Turčiansky Ďur","Martin"],["Turčiansky Peter","Martin"],["Valča","Martin"],["Vrícko","Martin"],["Vrútky","Martin"],["Záborie","Martin"],["Žabokreky","Martin"],["Abramová","Turčianske Teplice"],["Blažovce","Turčianske Teplice"],["Bodorová","Turčianske Teplice"],["Borcová","Turčianske Teplice"],["Brieštie","Turčianske Teplice"],["Budiš","Turčianske Teplice"],["Čremošné","Turčianske Teplice"],["Dubové","Turčianske Teplice"],["Háj","Turčianske Teplice"],["Horná Štubňa","Turčianske Teplice"],["Ivančiná","Turčianske Teplice"],["Jasenovo","Turčianske Teplice"],["Jazernica","Turčianske Teplice"],["Kaľamenová","Turčianske Teplice"],["Liešno","Turčianske Teplice"],["Malý Čepčín","Turčianske Teplice"],["Moškovec","Turčianske Teplice"],["Mošovce","Turčianske Teplice"],["Ondrašová","Turčianske Teplice"],["Rakša","Turčianske Teplice"],["Rudno","Turčianske Teplice"],["Sklené","Turčianske Teplice"],["Slovenské Pravno","Turčianske Teplice"],["Turček","Turčianske Teplice"],["Turčianske Teplice","Turčianske Teplice"],["Veľký Čepčín","Turčianske Teplice"],["Bešeňová","Ružomberok"],["Hubová","Ružomberok"],["Ivachnová","Ružomberok"],["Kalameny","Ružomberok"],["Komjatná","Ružomberok"],["Likavka","Ružomberok"],["Liptovská Lúžna","Ružomberok"],["Liptovská Osada","Ružomberok"],["Liptovská Štiavnica","Ružomberok"],["Liptovská Teplá","Ružomberok"],["Liptovské Revúce","Ružomberok"],["Liptovské Sliače","Ružomberok"],["Liptovský Michal","Ružomberok"],["Lisková","Ružomberok"],["Ľubochňa","Ružomberok"],["Lúčky","Ružomberok"],["Ludrová","Ružomberok"],["Martinček","Ružomberok"],["Potok","Ružomberok"],["Ružomberok","Ružomberok"],["Stankovany","Ružomberok"],["Štiavnička","Ružomberok"],["Švošov","Ružomberok"],["Turík","Ružomberok"],["Valaská Dubová","Ružomberok"],["Bytča","Bytča"],["Hlboké nad Váhom","Bytča"],["Hvozdnica","Bytča"],["Jablonové","Bytča"],["Kolárovice","Bytča"],["Kotešová","Bytča"],["Maršová-Rašov","Bytča"],["Petrovice","Bytča"],["Predmier","Bytča"],["Súľov-Hradná","Bytča"],["Štiavnik","Bytča"],["Veľké Rovné","Bytča"],["Dolný Vadičov","Kysucké Nové Mesto"],["Horný Vadičov","Kysucké Nové Mesto"],["Kysucké Nové Mesto","Kysucké Nové Mesto"],["Kysucký Lieskovec","Kysucké Nové Mesto"],["Lodno","Kysucké Nové Mesto"],["Lopušné Pažite","Kysucké Nové Mesto"],["Nesluša","Kysucké Nové Mesto"],["Ochodnica","Kysucké Nové Mesto"],["Povina","Kysucké Nové Mesto"],["Radoľa","Kysucké Nové Mesto"],["Rudina","Kysucké Nové Mesto"],["Rudinka","Kysucké Nové Mesto"],["Rudinská","Kysucké Nové Mesto"],["Snežnica","Kysucké Nové Mesto"],["Belá","Žilina"],["Bitarová","Žilina"],["Brezany","Žilina"],["Čičmany","Žilina"],["Divina","Žilina"],["Divinka","Žilina"],["Dlhé Pole","Žilina"],["Dolná Tižina","Žilina"],["Dolný Hričov","Žilina"],["Ďurčiná","Žilina"],["Fačkov","Žilina"],["Gbeľany","Žilina"],["Hôrky","Žilina"],["Horný Hričov","Žilina"],["Hričovské Podhradie","Žilina"],["Jasenové","Žilina"],["Kamenná Poruba","Žilina"],["Kľače","Žilina"],["Konská","Žilina"],["Kotrčiná Lúčka","Žilina"],["Krasňany","Žilina"],["Kunerad","Žilina"],["Lietava","Žilina"],["Lietavská Lúčka","Žilina"],["Lietavská Svinná-Babkov","Žilina"],["Lutiše","Žilina"],["Lysica","Žilina"],["Malá Čierna","Žilina"],["Mojš","Žilina"],["Nededza","Žilina"],["Nezbudská Lúčka","Žilina"],["Ovčiarsko","Žilina"],["Paština Závada","Žilina"],["Podhorie","Žilina"],["Porúbka","Žilina"],["Rajec","Žilina"],["Rajecká Lesná","Žilina"],["Rajecké Teplice","Žilina"],["Rosina","Žilina"],["Stráňavy","Žilina"],["Stránske","Žilina"],["Stráža","Žilina"],["Strečno","Žilina"],["Svederník","Žilina"],["Šuja","Žilina"],["Teplička nad Váhom","Žilina"],["Terchová","Žilina"],["Turie","Žilina"],["Varín","Žilina"],["Veľká Čierna","Žilina"],["Višňové","Žilina"],["Zbyňov","Žilina"],["Žilina","Žilina"],["Badín","Banská Bystrica"],["Baláže","Banská Bystrica"],["Banská Bystrica","Banská Bystrica"],["Brusno","Banská Bystrica"],["Čerín","Banská Bystrica"],["Dolná Mičiná","Banská Bystrica"],["Dolný Harmanec","Banská Bystrica"],["Donovaly","Banská Bystrica"],["Dúbravica","Banská Bystrica"],["Harmanec","Banská Bystrica"],["Hiadeľ","Banská Bystrica"],["Horná Mičiná","Banská Bystrica"],["Horné Pršany","Banská Bystrica"],["Hrochoť","Banská Bystrica"],["Hronsek","Banská Bystrica"],["Kordíky","Banská Bystrica"],["Králiky","Banská Bystrica"],["Kynceľová","Banská Bystrica"],["Ľubietová","Banská Bystrica"],["Lučatín","Banská Bystrica"],["Malachov","Banská Bystrica"],["Medzibrod","Banská Bystrica"],["Môlča","Banská Bystrica"],["Moštenica","Banská Bystrica"],["Motyčky","Banská Bystrica"],["Nemce","Banská Bystrica"],["Oravce","Banská Bystrica"],["Podkonice","Banská Bystrica"],["Pohronský Bukovec","Banská Bystrica"],["Poniky","Banská Bystrica"],["Povrazník","Banská Bystrica"],["Priechod","Banská Bystrica"],["Riečka","Banská Bystrica"],["Sebedín-Bečov","Banská Bystrica"],["Selce","Banská Bystrica"],["Slovenská Ľupča","Banská Bystrica"],["Staré Hory","Banská Bystrica"],["Strelníky","Banská Bystrica"],["Špania Dolina","Banská Bystrica"],["Tajov","Banská Bystrica"],["Turecká","Banská Bystrica"],["Vlkanová","Banská Bystrica"],["Baďan","Banská Štiavnica"],["Banská Belá","Banská Štiavnica"],["Banská Štiavnica","Banská Štiavnica"],["Banský Studenec","Banská Štiavnica"],["Beluj","Banská Štiavnica"],["Dekýš","Banská Štiavnica"],["Ilija","Banská Štiavnica"],["Kozelník","Banská Štiavnica"],["Močiar","Banská Štiavnica"],["Počúvadlo","Banská Štiavnica"],["Podhorie","Banská Štiavnica"],["Prenčov","Banská Štiavnica"],["Svätý Anton","Banská Štiavnica"],["Štiavnické Bane","Banská Štiavnica"],["Vysoká","Banská Štiavnica"],["Brehy","Žarnovica"],["Hodruša-Hámre","Žarnovica"],["Horné Hámre","Žarnovica"],["Hrabičov","Žarnovica"],["Hronský Beňadik","Žarnovica"],["Kľak","Žarnovica"],["Malá Lehota","Žarnovica"],["Nová Baňa","Žarnovica"],["Orovnica","Žarnovica"],["Ostrý Grúň","Žarnovica"],["Píla","Žarnovica"],["Rudno nad Hronom","Žarnovica"],["Tekovská Breznica","Žarnovica"],["Veľká Lehota","Žarnovica"],["Veľké Pole","Žarnovica"],["Voznica","Žarnovica"],["Žarnovica","Žarnovica"],["Župkov","Žarnovica"],["Bartošova Lehôtka","Žiar nad Hronom"],["Bzenica","Žiar nad Hronom"],["Dolná Trnávka","Žiar nad Hronom"],["Dolná Ves","Žiar nad Hronom"],["Dolná Ždaňa","Žiar nad Hronom"],["Hliník nad Hronom","Žiar nad Hronom"],["Horná Ves","Žiar nad Hronom"],["Horná Ždaňa","Žiar nad Hronom"],["Hronská Dúbrava","Žiar nad Hronom"],["Ihráč","Žiar nad Hronom"],["Janova Lehota","Žiar nad Hronom"],["Jastrabá","Žiar nad Hronom"],["Kopernica","Žiar nad Hronom"],["Kosorín","Žiar nad Hronom"],["Krahule","Žiar nad Hronom"],["Kremnica","Žiar nad Hronom"],["Kremnické Bane","Žiar nad Hronom"],["Kunešov","Žiar nad Hronom"],["Ladomerská Vieska","Žiar nad Hronom"],["Lehôtka pod Brehmi","Žiar nad Hronom"],["Lovča","Žiar nad Hronom"],["Lovčica-Trubín","Žiar nad Hronom"],["Lúčky","Žiar nad Hronom"],["Lutila","Žiar nad Hronom"],["Nevoľné","Žiar nad Hronom"],["Pitelová","Žiar nad Hronom"],["Prestavlky","Žiar nad Hronom"],["Prochot","Žiar nad Hronom"],["Repište","Žiar nad Hronom"],["Sklené Teplice","Žiar nad Hronom"],["Slaská","Žiar nad Hronom"],["Stará Kremnička","Žiar nad Hronom"],["Trnavá Hora","Žiar nad Hronom"],["Vyhne","Žiar nad Hronom"],["Žiar nad Hronom","Žiar nad Hronom"],["Bacúch","Brezno"],["Beňuš","Brezno"],["Braväcovo","Brezno"],["Brezno","Brezno"],["Bystrá","Brezno"],["Čierny Balog","Brezno"],["Dolná Lehota","Brezno"],["Drábsko","Brezno"],["Heľpa","Brezno"],["Horná Lehota","Brezno"],["Hronec","Brezno"],["Jarabá","Brezno"],["Jasenie","Brezno"],["Lom nad Rimavicou","Brezno"],["Michalová","Brezno"],["Mýto pod Ďumbierom","Brezno"],["Nemecká","Brezno"],["Osrblie","Brezno"],["Podbrezová","Brezno"],["Pohorelá","Brezno"],["Pohronská Polhora","Brezno"],["Polomka","Brezno"],["Predajná","Brezno"],["Ráztoka","Brezno"],["Sihla","Brezno"],["Šumiac","Brezno"],["Telgárt","Brezno"],["Valaská","Brezno"],["Vaľkovňa","Brezno"],["Závadka nad Hronom","Brezno"],["Ábelová","Lučenec"],["Belina","Lučenec"],["Biskupice","Lučenec"],["Boľkovce","Lučenec"],["Budiná","Lučenec"],["Bulhary","Lučenec"],["Buzitka","Lučenec"],["Čakanovce","Lučenec"],["Čamovce","Lučenec"],["Divín","Lučenec"],["Dobroč","Lučenec"],["Fiľakovo","Lučenec"],["Fiľakovské Kováče","Lučenec"],["Gregorova Vieska","Lučenec"],["Halič","Lučenec"],["Holiša","Lučenec"],["Jelšovec","Lučenec"],["Kalonda","Lučenec"],["Kotmanová","Lučenec"],["Lehôtka","Lučenec"],["Lentvora","Lučenec"],["Lipovany","Lučenec"],["Lovinobaňa","Lučenec"],["Ľuboreč","Lučenec"],["Lučenec","Lučenec"],["Lupoč","Lučenec"],["Mašková","Lučenec"],["Mikušovce","Lučenec"],["Mučín","Lučenec"],["Mýtna","Lučenec"],["Nitra nad Ipľom","Lučenec"],["Nové Hony","Lučenec"],["Panické Dravce","Lučenec"],["Píla","Lučenec"],["Pinciná","Lučenec"],["Pleš","Lučenec"],["Podrečany","Lučenec"],["Polichno","Lučenec"],["Praha","Lučenec"],["Prša","Lučenec"],["Radzovce","Lučenec"],["Rapovce","Lučenec"],["Ratka","Lučenec"],["Ružiná","Lučenec"],["Stará Halič","Lučenec"],["Šávoľ","Lučenec"],["Šiatorská Bukovinka","Lučenec"],["Šíd","Lučenec"],["Šurice","Lučenec"],["Točnica","Lučenec"],["Tomášovce","Lučenec"],["Trebeľovce","Lučenec"],["Trenč","Lučenec"],["Tuhár","Lučenec"],["Veľká nad Ipľom","Lučenec"],["Veľké Dravce","Lučenec"],["Vidiná","Lučenec"],["Breznička","Poltár"],["Cinobaňa","Poltár"],["České Brezovo","Poltár"],["Ďubákovo","Poltár"],["Hradište","Poltár"],["Hrnčiarska Ves","Poltár"],["Hrnčiarske Zalužany","Poltár"],["Kalinovo","Poltár"],["Kokava nad Rimavicou","Poltár"],["Krná","Poltár"],["Málinec","Poltár"],["Mládzovo","Poltár"],["Ozdín","Poltár"],["Poltár","Poltár"],["Rovňany","Poltár"],["Selce","Poltár"],["Sušany","Poltár"],["Šoltýska","Poltár"],["Uhorské","Poltár"],["Utekáč","Poltár"],["Veľká Ves","Poltár"],["Zlatno","Poltár"],["Chvalová","Revúca"],["Chyžné","Revúca"],["Držkovce","Revúca"],["Gemer","Revúca"],["Gemerská Ves","Revúca"],["Gemerské Teplice","Revúca"],["Gemerský Sad","Revúca"],["Hrlica","Revúca"],["Hucín","Revúca"],["Jelšava","Revúca"],["Kameňany","Revúca"],["Leváre","Revúca"],["Levkuška","Revúca"],["Licince","Revúca"],["Lubeník","Revúca"],["Magnezitovce","Revúca"],["Mokrá Lúka","Revúca"],["Muráň","Revúca"],["Muránska Dlhá Lúka","Revúca"],["Muránska Huta","Revúca"],["Muránska Lehota","Revúca"],["Muránska Zdychava","Revúca"],["Nandraž","Revúca"],["Otročok","Revúca"],["Ploské","Revúca"],["Polina","Revúca"],["Prihradzany","Revúca"],["Rákoš","Revúca"],["Rašice","Revúca"],["Ratková","Revúca"],["Ratkovské Bystré","Revúca"],["Revúca","Revúca"],["Revúcka Lehota","Revúca"],["Rybník","Revúca"],["Sása","Revúca"],["Sirk","Revúca"],["Skerešovo","Revúca"],["Šivetice","Revúca"],["Tornaľa","Revúca"],["Turčok","Revúca"],["Višňové","Revúca"],["Žiar","Revúca"],["Abovce","Rimavská Sobota"],["Babinec","Rimavská Sobota"],["Barca","Rimavská Sobota"],["Bátka","Rimavská Sobota"],["Belín","Rimavská Sobota"],["Blhovce","Rimavská Sobota"],["Bottovo","Rimavská Sobota"],["Budikovany","Rimavská Sobota"],["Cakov","Rimavská Sobota"],["Chanava","Rimavská Sobota"],["Chrámec","Rimavská Sobota"],["Čerenčany","Rimavská Sobota"],["Čierny Potok","Rimavská Sobota"],["Číž","Rimavská Sobota"],["Dolné Zahorany","Rimavská Sobota"],["Dražice","Rimavská Sobota"],["Drienčany","Rimavská Sobota"],["Drňa","Rimavská Sobota"],["Dubno","Rimavská Sobota"],["Dubovec","Rimavská Sobota"],["Dulovo","Rimavská Sobota"],["Figa","Rimavská Sobota"],["Gemerček","Rimavská Sobota"],["Gemerské Dechtáre","Rimavská Sobota"],["Gemerské Michalovce","Rimavská Sobota"],["Gemerský Jablonec","Rimavská Sobota"],["Gortva","Rimavská Sobota"],["Hajnáčka","Rimavská Sobota"],["Hnúšťa","Rimavská Sobota"],["Hodejov","Rimavská Sobota"],["Hodejovec","Rimavská Sobota"],["Horné Zahorany","Rimavská Sobota"],["Hostice","Rimavská Sobota"],["Hostišovce","Rimavská Sobota"],["Hrachovo","Rimavská Sobota"],["Hrušovo","Rimavská Sobota"],["Hubovo","Rimavská Sobota"],["Husiná","Rimavská Sobota"],["Ivanice","Rimavská Sobota"],["Janice","Rimavská Sobota"],["Jesenské","Rimavská Sobota"],["Jestice","Rimavská Sobota"],["Kaloša","Rimavská Sobota"],["Kesovce","Rimavská Sobota"],["Klenovec","Rimavská Sobota"],["Kociha","Rimavská Sobota"],["Konrádovce","Rimavská Sobota"],["Kráľ","Rimavská Sobota"],["Kraskovo","Rimavská Sobota"],["Krokava","Rimavská Sobota"],["Kružno","Rimavská Sobota"],["Kyjatice","Rimavská Sobota"],["Lehota nad Rimavicou","Rimavská Sobota"],["Lenartovce","Rimavská Sobota"],["Lenka","Rimavská Sobota"],["Lipovec","Rimavská Sobota"],["Lukovištia","Rimavská Sobota"],["Martinová","Rimavská Sobota"],["Neporadza","Rimavská Sobota"],["Nižný Skálnik","Rimavská Sobota"],["Nová Bašta","Rimavská Sobota"],["Orávka","Rimavská Sobota"],["Ožďany","Rimavská Sobota"],["Padarovce","Rimavská Sobota"],["Pavlovce","Rimavská Sobota"],["Petrovce","Rimavská Sobota"],["Poproč","Rimavská Sobota"],["Potok","Rimavská Sobota"],["Radnovce","Rimavská Sobota"],["Rakytník","Rimavská Sobota"],["Ratkovská Lehota","Rimavská Sobota"],["Ratkovská Suchá","Rimavská Sobota"],["Riečka","Rimavská Sobota"],["Rimavská Baňa","Rimavská Sobota"],["Rimavská Seč","Rimavská Sobota"],["Rimavská Sobota","Rimavská Sobota"],["Rimavské Brezovo","Rimavská Sobota"],["Rimavské Janovce","Rimavská Sobota"],["Rimavské Zalužany","Rimavská Sobota"],["Rovné","Rimavská Sobota"],["Rumince","Rimavská Sobota"],["Slizké","Rimavská Sobota"],["Stará Bašta","Rimavská Sobota"],["Stránska","Rimavská Sobota"],["Studená","Rimavská Sobota"],["Sútor","Rimavská Sobota"],["Šimonovce","Rimavská Sobota"],["Širkovce","Rimavská Sobota"],["Španie Pole","Rimavská Sobota"],["Štrkovec","Rimavská Sobota"],["Tachty","Rimavská Sobota"],["Teplý Vrch","Rimavská Sobota"],["Tisovec","Rimavská Sobota"],["Tomášovce","Rimavská Sobota"],["Uzovská Panica","Rimavská Sobota"],["Valice","Rimavská Sobota"],["Včelince","Rimavská Sobota"],["Večelkov","Rimavská Sobota"],["Veľké Teriakovce","Rimavská Sobota"],["Veľký Blh","Rimavská Sobota"],["Vieska nad Blhom","Rimavská Sobota"],["Vlkyňa","Rimavská Sobota"],["Vyšné Valice","Rimavská Sobota"],["Vyšný Skálnik","Rimavská Sobota"],["Zacharovce","Rimavská Sobota"],["Zádor","Rimavská Sobota"],["Žíp","Rimavská Sobota"],["Balog nad Ipľom","Veľký Krtíš"],["Bátorová","Veľký Krtíš"],["Brusník","Veľký Krtíš"],["Bušince","Veľký Krtíš"],["Chrastince","Veľký Krtíš"],["Chrťany","Veľký Krtíš"],["Čebovce","Veľký Krtíš"],["Čeláre","Veľký Krtíš"],["Čelovce","Veľký Krtíš"],["Červeňany","Veľký Krtíš"],["Dačov Lom","Veľký Krtíš"],["Dolinka","Veľký Krtíš"],["Dolná Strehová","Veľký Krtíš"],["Dolné Plachtince","Veľký Krtíš"],["Dolné Strháre","Veľký Krtíš"],["Ďurkovce","Veľký Krtíš"],["Glabušovce","Veľký Krtíš"],["Horná Strehová","Veľký Krtíš"],["Horné Plachtince","Veľký Krtíš"],["Horné Strháre","Veľký Krtíš"],["Hrušov","Veľký Krtíš"],["Ipeľské Predmostie","Veľký Krtíš"],["Kamenné Kosihy","Veľký Krtíš"],["Kiarov","Veľký Krtíš"],["Kleňany","Veľký Krtíš"],["Koláre","Veľký Krtíš"],["Kosihovce","Veľký Krtíš"],["Kosihy nad Ipľom","Veľký Krtíš"],["Kováčovce","Veľký Krtíš"],["Lesenice","Veľký Krtíš"],["Ľuboriečka","Veľký Krtíš"],["Malá Čalomija","Veľký Krtíš"],["Malé Straciny","Veľký Krtíš"],["Malé Zlievce","Veľký Krtíš"],["Malý Krtíš","Veľký Krtíš"],["Modrý Kameň","Veľký Krtíš"],["Muľa","Veľký Krtíš"],["Nenince","Veľký Krtíš"],["Nová Ves","Veľký Krtíš"],["Obeckov","Veľký Krtíš"],["Olováry","Veľký Krtíš"],["Opatovská Nová Ves","Veľký Krtíš"],["Opava","Veľký Krtíš"],["Pôtor","Veľký Krtíš"],["Pravica","Veľký Krtíš"],["Príbelce","Veľký Krtíš"],["Sečianky","Veľký Krtíš"],["Seľany","Veľký Krtíš"],["Senné","Veľký Krtíš"],["Sklabiná","Veľký Krtíš"],["Slovenské Ďarmoty","Veľký Krtíš"],["Slovenské Kľačany","Veľký Krtíš"],["Stredné Plachtince","Veľký Krtíš"],["Sucháň","Veľký Krtíš"],["Suché Brezovo","Veľký Krtíš"],["Širákov","Veľký Krtíš"],["Šuľa","Veľký Krtíš"],["Trebušovce","Veľký Krtíš"],["Veľká Čalomija","Veľký Krtíš"],["Veľká Ves nad Ipľom","Veľký Krtíš"],["Veľké Straciny","Veľký Krtíš"],["Veľké Zlievce","Veľký Krtíš"],["Veľký Krtíš","Veľký Krtíš"],["Veľký Lom","Veľký Krtíš"],["Vieska","Veľký Krtíš"],["Vinica","Veľký Krtíš"],["Vrbovka","Veľký Krtíš"],["Záhorce","Veľký Krtíš"],["Závada","Veľký Krtíš"],["Zombor","Veľký Krtíš"],["Želovce","Veľký Krtíš"],["Detva","Detva"],["Detvianska Huta","Detva"],["Dúbravy","Detva"],["Horný Tisovník","Detva"],["Hriňová","Detva"],["Klokoč","Detva"],["Korytárky","Detva"],["Kriváň","Detva"],["Látky","Detva"],["Podkriváň","Detva"],["Slatinské Lazy","Detva"],["Stará Huta","Detva"],["Stožok","Detva"],["Vígľaš","Detva"],["Vígľašská Huta-Kalinka","Detva"],["Bzovík","Krupina"],["Cerovo","Krupina"],["Čabradský Vrbovok","Krupina"],["Čekovce","Krupina"],["Devičie","Krupina"],["Dolné Mladonice","Krupina"],["Dolný Badín","Krupina"],["Domaníky","Krupina"],["Drážovce","Krupina"],["Drienovo","Krupina"],["Dudince","Krupina"],["Hontianske Moravce","Krupina"],["Hontianske Nemce","Krupina"],["Hontianske Tesáre","Krupina"],["Horné Mladonice","Krupina"],["Horný Badín","Krupina"],["Jalšovík","Krupina"],["Kozí Vrbovok","Krupina"],["Kráľovce-Krnišov","Krupina"],["Krupina","Krupina"],["Lackov","Krupina"],["Ladzany","Krupina"],["Lišov","Krupina"],["Litava","Krupina"],["Medovarce","Krupina"],["Rykynčice","Krupina"],["Sebechleby","Krupina"],["Selce","Krupina"],["Senohrad","Krupina"],["Sudince","Krupina"],["Súdovce","Krupina"],["Terany","Krupina"],["Trpín","Krupina"],["Uňatín","Krupina"],["Zemiansky Vrbovok","Krupina"],["Žibritov","Krupina"],["Babiná","Zvolen"],["Bacúrov","Zvolen"],["Breziny","Zvolen"],["Budča","Zvolen"],["Bzovská Lehôtka","Zvolen"],["Dobrá Niva","Zvolen"],["Dubové","Zvolen"],["Hronská Breznica","Zvolen"],["Kováčová","Zvolen"],["Lešť (vojenský obvod)","Zvolen"],["Lieskovec","Zvolen"],["Lukavica","Zvolen"],["Michalková","Zvolen"],["Očová","Zvolen"],["Ostrá Lúka","Zvolen"],["Pliešovce","Zvolen"],["Podzámčok","Zvolen"],["Sása","Zvolen"],["Sielnica","Zvolen"],["Sliač","Zvolen"],["Tŕnie","Zvolen"],["Turová","Zvolen"],["Veľká Lúka","Zvolen"],["Zvolen","Zvolen"],["Zvolenská Slatina","Zvolen"],["Železná Breznica","Zvolen"],["Abrahámovce","Bardejov"],["Andrejová","Bardejov"],["Bardejov","Bardejov"],["Bartošovce","Bardejov"],["Becherov","Bardejov"],["Beloveža","Bardejov"],["Bogliarka","Bardejov"],["Brezov","Bardejov"],["Brezovka","Bardejov"],["Buclovany","Bardejov"],["Chmeľová","Bardejov"],["Cigeľka","Bardejov"],["Dubinné","Bardejov"],["Frička","Bardejov"],["Fričkovce","Bardejov"],["Gaboltov","Bardejov"],["Gerlachov","Bardejov"],["Hankovce","Bardejov"],["Harhaj","Bardejov"],["Hažlín","Bardejov"],["Hertník","Bardejov"],["Hervartov","Bardejov"],["Hrabovec","Bardejov"],["Hrabské","Bardejov"],["Hutka","Bardejov"],["Janovce","Bardejov"],["Jedlinka","Bardejov"],["Kľušov","Bardejov"],["Kobyly","Bardejov"],["Kochanovce","Bardejov"],["Komárov","Bardejov"],["Koprivnica","Bardejov"],["Kožany","Bardejov"],["Krivé","Bardejov"],["Kríže","Bardejov"],["Kružlov","Bardejov"],["Kučín","Bardejov"],["Kurima","Bardejov"],["Kurov","Bardejov"],["Lascov","Bardejov"],["Lenartov","Bardejov"],["Lipová","Bardejov"],["Livov","Bardejov"],["Livovská Huta","Bardejov"],["Lopúchov","Bardejov"],["Lukavica","Bardejov"],["Lukov","Bardejov"],["Malcov","Bardejov"],["Marhaň","Bardejov"],["Mikulášová","Bardejov"],["Mokroluh","Bardejov"],["Nemcovce","Bardejov"],["Nižná Polianka","Bardejov"],["Nižná Voľa","Bardejov"],["Nižný Tvarožec","Bardejov"],["Oľšavce","Bardejov"],["Ondavka","Bardejov"],["Ortuťová","Bardejov"],["Osikov","Bardejov"],["Petrová","Bardejov"],["Poliakovce","Bardejov"],["Porúbka","Bardejov"],["Raslavice","Bardejov"],["Regetovka","Bardejov"],["Rešov","Bardejov"],["Richvald","Bardejov"],["Rokytov","Bardejov"],["Smilno","Bardejov"],["Snakov","Bardejov"],["Stebnícka Huta","Bardejov"],["Stebník","Bardejov"],["Stuľany","Bardejov"],["Sveržov","Bardejov"],["Šarišské Čierne","Bardejov"],["Šašová","Bardejov"],["Šiba","Bardejov"],["Tarnov","Bardejov"],["Tročany","Bardejov"],["Vaniškovce","Bardejov"],["Varadka","Bardejov"],["Vyšná Polianka","Bardejov"],["Vyšná Voľa","Bardejov"],["Vyšný Kručov","Bardejov"],["Vyšný Tvarožec","Bardejov"],["Zborov","Bardejov"],["Zlaté","Bardejov"],["Belejovce","Svidník"],["Beňadikovce","Svidník"],["Bodružal","Svidník"],["Cernina","Svidník"],["Cigla","Svidník"],["Dlhoňa","Svidník"],["Dobroslava","Svidník"],["Dubová","Svidník"],["Dukovce","Svidník"],["Fijaš","Svidník"],["Giraltovce","Svidník"],["Havranec","Svidník"],["Hrabovčík","Svidník"],["Hunkovce","Svidník"],["Jurkova Voľa","Svidník"],["Kalnište","Svidník"],["Kapišová","Svidník"],["Kečkovce","Svidník"],["Kobylnice","Svidník"],["Korejovce","Svidník"],["Kračúnovce","Svidník"],["Krajná Bystrá","Svidník"],["Krajná Poľana","Svidník"],["Krajná Porúbka","Svidník"],["Krajné Čierno","Svidník"],["Kružlová","Svidník"],["Kuková","Svidník"],["Kurimka","Svidník"],["Ladomirová","Svidník"],["Lúčka","Svidník"],["Lužany pri Topli","Svidník"],["Matovce","Svidník"],["Medvedie","Svidník"],["Mestisko","Svidník"],["Mičakovce","Svidník"],["Miroľa","Svidník"],["Mlynárovce","Svidník"],["Nižná Jedľová","Svidník"],["Nižná Pisaná","Svidník"],["Nižný Komárnik","Svidník"],["Nižný Mirošov","Svidník"],["Nižný Orlík","Svidník"],["Nová Polianka","Svidník"],["Okrúhle","Svidník"],["Príkra","Svidník"],["Pstriná","Svidník"],["Radoma","Svidník"],["Rakovčík","Svidník"],["Rovné","Svidník"],["Roztoky","Svidník"],["Soboš","Svidník"],["Stročín","Svidník"],["Svidnička","Svidník"],["Svidník","Svidník"],["Šarbov","Svidník"],["Šarišský Štiavnik","Svidník"],["Šemetkovce","Svidník"],["Štefurov","Svidník"],["Vagrinec","Svidník"],["Valkovce","Svidník"],["Vápeník","Svidník"],["Vyšná Jedľová","Svidník"],["Vyšná Pisaná","Svidník"],["Vyšný Komárnik","Svidník"],["Vyšný Mirošov","Svidník"],["Vyšný Orlík","Svidník"],["Železník","Svidník"],["Želmanovce","Svidník"],["Adidovce","Humenné"],["Baškovce","Humenné"],["Brekov","Humenné"],["Brestov","Humenné"],["Chlmec","Humenné"],["Černina","Humenné"],["Dedačov","Humenné"],["Gruzovce","Humenné"],["Hankovce","Humenné"],["Hažín nad Cirochou","Humenné"],["Hrabovec nad Laborcom","Humenné"],["Hrubov","Humenné"],["Hudcovce","Humenné"],["Humenné","Humenné"],["Jabloň","Humenné"],["Jankovce","Humenné"],["Jasenov","Humenné"],["Kamenica nad Cirochou","Humenné"],["Kamienka","Humenné"],["Karná","Humenné"],["Kochanovce","Humenné"],["Košarovce","Humenné"],["Koškovce","Humenné"],["Lackovce","Humenné"],["Lieskovec","Humenné"],["Ľubiša","Humenné"],["Lukačovce","Humenné"],["Maškovce","Humenné"],["Modra nad Cirochou","Humenné"],["Myslina","Humenné"],["Nechválova Polianka","Humenné"],["Nižná Jablonka","Humenné"],["Nižná Sitnica","Humenné"],["Nižné Ladičkovce","Humenné"],["Ohradzany","Humenné"],["Pakostov","Humenné"],["Papín","Humenné"],["Porúbka","Humenné"],["Prituľany","Humenné"],["Ptičie","Humenné"],["Rohožník","Humenné"],["Rokytov pri Humennom","Humenné"],["Rovné","Humenné"],["Ruská Kajňa","Humenné"],["Ruská Poruba","Humenné"],["Slovenská Volová","Humenné"],["Slovenské Krivé","Humenné"],["Sopkovce","Humenné"],["Topoľovka","Humenné"],["Turcovce","Humenné"],["Udavské","Humenné"],["Valaškovce (voj.obvod)","Humenné"],["Veľopolie","Humenné"],["Víťazovce","Humenné"],["Vyšná Jablonka","Humenné"],["Vyšná Sitnica","Humenné"],["Vyšné Ladičkovce","Humenné"],["Vyšný Hrušov","Humenné"],["Závada","Humenné"],["Závadka","Humenné"],["Zbudské Dlhé","Humenné"],["Zubné","Humenné"],["Belá nad Cirochou","Snina"],["Brezovec","Snina"],["Čukalovce","Snina"],["Dlhé nad Cirochou","Snina"],["Dúbrava","Snina"],["Hostovice","Snina"],["Hrabová Roztoka","Snina"],["Jalová","Snina"],["Kalná Roztoka","Snina"],["Klenová","Snina"],["Kolbasov","Snina"],["Kolonica","Snina"],["Ladomirov","Snina"],["Michajlov","Snina"],["Nová Sedlica","Snina"],["Osadné","Snina"],["Parihuzovce","Snina"],["Pčoliné","Snina"],["Pichne","Snina"],["Príslop","Snina"],["Runina","Snina"],["Ruská Volová","Snina"],["Ruský Potok","Snina"],["Snina","Snina"],["Stakčín","Snina"],["Stakčínska Roztoka","Snina"],["Strihovce","Snina"],["Šmigovec","Snina"],["Topoľa","Snina"],["Ubľa","Snina"],["Ulič","Snina"],["Uličské Krivé","Snina"],["Zboj","Snina"],["Zemplínske Hámre","Snina"],["Baldovce","Levoča"],["Beharovce","Levoča"],["Bijacovce","Levoča"],["Brutovce","Levoča"],["Buglovce","Levoča"],["Dlhé Stráže","Levoča"],["Doľany","Levoča"],["Domaňovce","Levoča"],["Dravce","Levoča"],["Dúbrava","Levoča"],["Granč-Petrovce","Levoča"],["Harakovce","Levoča"],["Jablonov","Levoča"],["Klčov","Levoča"],["Korytné","Levoča"],["Kurimany","Levoča"],["Levoča","Levoča"],["Lúčka","Levoča"],["Nemešany","Levoča"],["Nižné Repaše","Levoča"],["Oľšavica","Levoča"],["Ordzovany","Levoča"],["Pavľany","Levoča"],["Poľanovce","Levoča"],["Pongrácovce","Levoča"],["Spišské Podhradie","Levoča"],["Spišský Hrhov","Levoča"],["Spišský Štvrtok","Levoča"],["Studenec","Levoča"],["Torysky","Levoča"],["Uloža","Levoča"],["Vyšné Repaše","Levoča"],["Vyšný Slavkov","Levoča"],["Batizovce","Poprad"],["Gánovce","Poprad"],["Gerlachov","Poprad"],["Hôrka","Poprad"],["Hozelec","Poprad"],["Hranovnica","Poprad"],["Jánovce","Poprad"],["Kravany","Poprad"],["Liptovská Teplička","Poprad"],["Lučivná","Poprad"],["Mengusovce","Poprad"],["Mlynica","Poprad"],["Nová Lesná","Poprad"],["Poprad","Poprad"],["Spišská Teplica","Poprad"],["Spišské Bystré","Poprad"],["Spišský Štiavnik","Poprad"],["Svit","Poprad"],["Štôla","Poprad"],["Štrba","Poprad"],["Šuňava","Poprad"],["Švábovce","Poprad"],["Tatranská Javorina","Poprad"],["Veľký Slavkov","Poprad"],["Vernár","Poprad"],["Vikartovce","Poprad"],["Vydrník","Poprad"],["Vysoké Tatry","Poprad"],["Ždiar","Poprad"],["Abranovce","Prešov"],["Bajerov","Prešov"],["Bertotovce","Prešov"],["Brestov","Prešov"],["Bretejovce","Prešov"],["Brežany","Prešov"],["Bzenov","Prešov"],["Chmeľov","Prešov"],["Chmeľovec","Prešov"],["Chmiňany","Prešov"],["Chminianska Nová Ves","Prešov"],["Chminianske Jakubovany","Prešov"],["Čelovce","Prešov"],["Červenica","Prešov"],["Demjata","Prešov"],["Drienov","Prešov"],["Drienovská Nová Ves","Prešov"],["Dulova Ves","Prešov"],["Fintice","Prešov"],["Fričovce","Prešov"],["Fulianka","Prešov"],["Geraltov","Prešov"],["Gregorovce","Prešov"],["Haniska","Prešov"],["Hendrichovce","Prešov"],["Hermanovce","Prešov"],["Hrabkov","Prešov"],["Janov","Prešov"],["Janovík","Prešov"],["Kapušany","Prešov"],["Kendice","Prešov"],["Klenov","Prešov"],["Kojatice","Prešov"],["Kokošovce","Prešov"],["Krížovany","Prešov"],["Kvačany","Prešov"],["Lada","Prešov"],["Lažany","Prešov"],["Lemešany","Prešov"],["Lesíček","Prešov"],["Ličartovce","Prešov"],["Lipníky","Prešov"],["Lipovce","Prešov"],["Ľubotice","Prešov"],["Ľubovec","Prešov"],["Lúčina","Prešov"],["Malý Slivník","Prešov"],["Malý Šariš","Prešov"],["Medzany","Prešov"],["Miklušovce","Prešov"],["Mirkovce","Prešov"],["Mošurov","Prešov"],["Nemcovce","Prešov"],["Okružná","Prešov"],["Ondrašovce","Prešov"],["Ovčie","Prešov"],["Petrovany","Prešov"],["Podhorany","Prešov"],["Podhradík","Prešov"],["Prešov","Prešov"],["Proč","Prešov"],["Pušovce","Prešov"],["Radatice","Prešov"],["Rokycany","Prešov"],["Ruská Nová Ves","Prešov"],["Sedlice","Prešov"],["Seniakovce","Prešov"],["Suchá Dolina","Prešov"],["Svinia","Prešov"],["Šarišská Poruba","Prešov"],["Šarišská Trstená","Prešov"],["Šarišské Bohdanovce","Prešov"],["Šindliar","Prešov"],["Široké","Prešov"],["Štefanovce","Prešov"],["Teriakovce","Prešov"],["Terňa","Prešov"],["Trnkov","Prešov"],["Tuhrina","Prešov"],["Tulčík","Prešov"],["Varhaňovce","Prešov"],["Veľký Slivník","Prešov"],["Veľký Šariš","Prešov"],["Víťaz","Prešov"],["Vyšná Šebastová","Prešov"],["Záborské","Prešov"],["Záhradné","Prešov"],["Zlatá Baňa","Prešov"],["Žehňa","Prešov"],["Žipov","Prešov"],["Župčany","Prešov"],["Bajerovce","Sabinov"],["Bodovce","Sabinov"],["Brezovica","Sabinov"],["Brezovička","Sabinov"],["Červená Voda","Sabinov"],["Červenica pri Sabinove","Sabinov"],["Ďačov","Sabinov"],["Daletice","Sabinov"],["Drienica","Sabinov"],["Dubovica","Sabinov"],["Hanigovce","Sabinov"],["Hubošovce","Sabinov"],["Jakovany","Sabinov"],["Jakubova Voľa","Sabinov"],["Jakubovany","Sabinov"],["Jarovnice","Sabinov"],["Kamenica","Sabinov"],["Krásna Lúka","Sabinov"],["Krivany","Sabinov"],["Lipany","Sabinov"],["Lúčka","Sabinov"],["Ľutina","Sabinov"],["Milpoš","Sabinov"],["Nižný Slavkov","Sabinov"],["Olejníkov","Sabinov"],["Oľšov","Sabinov"],["Ostrovany","Sabinov"],["Pečovská Nová Ves","Sabinov"],["Poloma","Sabinov"],["Ratvaj","Sabinov"],["Ražňany","Sabinov"],["Renčišov","Sabinov"],["Rožkovany","Sabinov"],["Sabinov","Sabinov"],["Šarišské Dravce","Sabinov"],["Šarišské Michaľany","Sabinov"],["Šarišské Sokolovce","Sabinov"],["Tichý Potok","Sabinov"],["Torysa","Sabinov"],["Uzovce","Sabinov"],["Uzovské Pekľany","Sabinov"],["Uzovský Šalgov","Sabinov"],["Vysoká","Sabinov"],["Chmeľnica","Stará Ľubovňa"],["Čirč","Stará Ľubovňa"],["Ďurková","Stará Ľubovňa"],["Forbasy","Stará Ľubovňa"],["Hajtovka","Stará Ľubovňa"],["Haligovce","Stará Ľubovňa"],["Hniezdne","Stará Ľubovňa"],["Hraničné","Stará Ľubovňa"],["Hromoš","Stará Ľubovňa"],["Jakubany","Stará Ľubovňa"],["Jarabina","Stará Ľubovňa"],["Kamienka","Stará Ľubovňa"],["Kolačkov","Stará Ľubovňa"],["Kremná","Stará Ľubovňa"],["Kyjov","Stará Ľubovňa"],["Lacková","Stará Ľubovňa"],["Legnava","Stará Ľubovňa"],["Lesnica","Stará Ľubovňa"],["Litmanová","Stará Ľubovňa"],["Lomnička","Stará Ľubovňa"],["Ľubotín","Stará Ľubovňa"],["Malý Lipník","Stará Ľubovňa"],["Matysová","Stará Ľubovňa"],["Mníšek nad Popradom","Stará Ľubovňa"],["Nižné Ružbachy","Stará Ľubovňa"],["Nová Ľubovňa","Stará Ľubovňa"],["Obručné","Stará Ľubovňa"],["Orlov","Stará Ľubovňa"],["Plaveč","Stará Ľubovňa"],["Plavnica","Stará Ľubovňa"],["Podolínec","Stará Ľubovňa"],["Pusté Pole","Stará Ľubovňa"],["Ruská Voľa nad Popradom","Stará Ľubovňa"],["Stará Ľubovňa","Stará Ľubovňa"],["Starina","Stará Ľubovňa"],["Stráňany","Stará Ľubovňa"],["Sulín","Stará Ľubovňa"],["Šambron","Stará Ľubovňa"],["Šarišské Jastrabie","Stará Ľubovňa"],["Údol","Stará Ľubovňa"],["Veľká Lesná","Stará Ľubovňa"],["Veľký Lipník","Stará Ľubovňa"],["Vislanka","Stará Ľubovňa"],["Vyšné Ružbachy","Stará Ľubovňa"],["Brestov nad Laborcom","Medzilaborce"],["Čabalovce","Medzilaborce"],["Čabiny","Medzilaborce"],["Čertižné","Medzilaborce"],["Habura","Medzilaborce"],["Kalinov","Medzilaborce"],["Krásny Brod","Medzilaborce"],["Medzilaborce","Medzilaborce"],["Ňagov","Medzilaborce"],["Oľka","Medzilaborce"],["Oľšinkov","Medzilaborce"],["Palota","Medzilaborce"],["Radvaň nad Laborcom","Medzilaborce"],["Repejov","Medzilaborce"],["Rokytovce","Medzilaborce"],["Roškovce","Medzilaborce"],["Sukov","Medzilaborce"],["Svetlice","Medzilaborce"],["Valentovce","Medzilaborce"],["Volica","Medzilaborce"],["Výrava","Medzilaborce"],["Zbojné","Medzilaborce"],["Zbudská Belá","Medzilaborce"],["Baňa","Stropkov"],["Breznica","Stropkov"],["Breznička","Stropkov"],["Brusnica","Stropkov"],["Bukovce","Stropkov"],["Bystrá","Stropkov"],["Bžany","Stropkov"],["Chotča","Stropkov"],["Duplín","Stropkov"],["Gribov","Stropkov"],["Havaj","Stropkov"],["Jakušovce","Stropkov"],["Kolbovce","Stropkov"],["Korunková","Stropkov"],["Kožuchovce","Stropkov"],["Krišľovce","Stropkov"],["Kručov","Stropkov"],["Krušinec","Stropkov"],["Lomné","Stropkov"],["Makovce","Stropkov"],["Malá Poľana","Stropkov"],["Miková","Stropkov"],["Miňovce","Stropkov"],["Mrázovce","Stropkov"],["Nižná Olšava","Stropkov"],["Oľšavka","Stropkov"],["Potôčky","Stropkov"],["Potoky","Stropkov"],["Soľník","Stropkov"],["Staškovce","Stropkov"],["Stropkov","Stropkov"],["Šandal","Stropkov"],["Tisinec","Stropkov"],["Tokajík","Stropkov"],["Turany nad Ondavou","Stropkov"],["Varechovce","Stropkov"],["Veľkrop","Stropkov"],["Vislava","Stropkov"],["Vladiča","Stropkov"],["Vojtovce","Stropkov"],["Vyškovce","Stropkov"],["Vyšná Olšava","Stropkov"],["Vyšný Hrabovec","Stropkov"],["Babie","Vranov nad Topľou"],["Banské","Vranov nad Topľou"],["Benkovce","Vranov nad Topľou"],["Bystré","Vranov nad Topľou"],["Cabov","Vranov nad Topľou"],["Čaklov","Vranov nad Topľou"],["Čičava","Vranov nad Topľou"],["Čierne nad Topľou","Vranov nad Topľou"],["Ďapalovce","Vranov nad Topľou"],["Davidov","Vranov nad Topľou"],["Detrík","Vranov nad Topľou"],["Dlhé Klčovo","Vranov nad Topľou"],["Ďurďoš","Vranov nad Topľou"],["Giglovce","Vranov nad Topľou"],["Girovce","Vranov nad Topľou"],["Hanušovce nad Topľou","Vranov nad Topľou"],["Hencovce","Vranov nad Topľou"],["Hermanovce nad Topľou","Vranov nad Topľou"],["Hlinné","Vranov nad Topľou"],["Holčíkovce","Vranov nad Topľou"],["Jasenovce","Vranov nad Topľou"],["Jastrabie nad Topľou","Vranov nad Topľou"],["Juskova Voľa","Vranov nad Topľou"],["Kamenná Poruba","Vranov nad Topľou"],["Kladzany","Vranov nad Topľou"],["Komárany","Vranov nad Topľou"],["Kučín","Vranov nad Topľou"],["Kvakovce","Vranov nad Topľou"],["Majerovce","Vranov nad Topľou"],["Malá Domaša","Vranov nad Topľou"],["Matiaška","Vranov nad Topľou"],["Medzianky","Vranov nad Topľou"],["Merník","Vranov nad Topľou"],["Michalok","Vranov nad Topľou"],["Nižný Hrabovec","Vranov nad Topľou"],["Nižný Hrušov","Vranov nad Topľou"],["Nižný Kručov","Vranov nad Topľou"],["Nová Kelča","Vranov nad Topľou"],["Ondavské Matiašovce","Vranov nad Topľou"],["Pavlovce","Vranov nad Topľou"],["Petkovce","Vranov nad Topľou"],["Petrovce","Vranov nad Topľou"],["Piskorovce","Vranov nad Topľou"],["Poša","Vranov nad Topľou"],["Prosačov","Vranov nad Topľou"],["Radvanovce","Vranov nad Topľou"],["Rafajovce","Vranov nad Topľou"],["Remeniny","Vranov nad Topľou"],["Rudlov","Vranov nad Topľou"],["Ruská Voľa","Vranov nad Topľou"],["Sačurov","Vranov nad Topľou"],["Sečovská Polianka","Vranov nad Topľou"],["Sedliská","Vranov nad Topľou"],["Skrabské","Vranov nad Topľou"],["Slovenská Kajňa","Vranov nad Topľou"],["Soľ","Vranov nad Topľou"],["Štefanovce","Vranov nad Topľou"],["Tovarné","Vranov nad Topľou"],["Tovarnianska Polianka","Vranov nad Topľou"],["Vavrinec","Vranov nad Topľou"],["Vechec","Vranov nad Topľou"],["Vlača","Vranov nad Topľou"],["Vranov nad Topľou","Vranov nad Topľou"],["Vyšný Kazimír","Vranov nad Topľou"],["Vyšný Žipov","Vranov nad Topľou"],["Zámutov","Vranov nad Topľou"],["Zlatník","Vranov nad Topľou"],["Žalobín","Vranov nad Topľou"],["Abrahámovce","Kežmarok"],["Bušovce","Kežmarok"],["Červený Kláštor","Kežmarok"],["Havka","Kežmarok"],["Holumnica","Kežmarok"],["Hradisko","Kežmarok"],["Huncovce","Kežmarok"],["Ihľany","Kežmarok"],["Javorina (vojen.obvod)","Kežmarok"],["Jezersko","Kežmarok"],["Jurské","Kežmarok"],["Kežmarok","Kežmarok"],["Krížová Ves","Kežmarok"],["Lechnica","Kežmarok"],["Lendak","Kežmarok"],["Ľubica","Kežmarok"],["Majere","Kežmarok"],["Malá Franková","Kežmarok"],["Malý Slavkov","Kežmarok"],["Matiašovce","Kežmarok"],["Mlynčeky","Kežmarok"],["Osturňa","Kežmarok"],["Podhorany","Kežmarok"],["Rakúsy","Kežmarok"],["Reľov","Kežmarok"],["Slovenská Ves","Kežmarok"],["Spišská Belá","Kežmarok"],["Spišská Stará Ves","Kežmarok"],["Spišské Hanušovce","Kežmarok"],["Stará Lesná","Kežmarok"],["Stráne pod Tatrami","Kežmarok"],["Toporec","Kežmarok"],["Tvarožná","Kežmarok"],["Veľká Franková","Kežmarok"],["Veľká Lomnica","Kežmarok"],["Vlková","Kežmarok"],["Vlkovce","Kežmarok"],["Vojňany","Kežmarok"],["Vrbov","Kežmarok"],["Výborná","Kežmarok"],["Zálesie","Kežmarok"],["Žakovce","Kežmarok"],["Košice-Džungľa","Košice I"],["Košice-Kavečany","Košice I"],["Košice-Sever","Košice I"],["Košice-Sídl.Ťahanovce","Košice I"],["Košice-Staré Mesto","Košice I"],["Košice-Ťahanovce","Košice I"],["Košice-Lorinčík","Košice II"],["Košice-Luník IX","Košice II"],["Košice-Myslava","Košice II"],["Košice-Pereš","Košice II"],["Košice-Poľov","Košice II"],["Košice-Sídlisko KVP","Košice II"],["Košice-Šaca","Košice II"],["Košice-Západ","Košice II"],["Košice-Dargov.hrdinov","Košice III"],["Košice-Košic.Nová Ves","Košice III"],["Košice-Barca","Košice IV"],["Košice-Juh","Košice IV"],["Košice-Krásna","Košice IV"],["Košice-Nad jazerom","Košice IV"],["Košice-Šebastovce","Košice IV"],["Košice-Vyšné Opátske","Košice IV"],["Bačkovík","Košice - okolie"],["Baška","Košice - okolie"],["Belža","Košice - okolie"],["Beniakovce","Košice - okolie"],["Bidovce","Košice - okolie"],["Blažice","Košice - okolie"],["Bočiar","Košice - okolie"],["Bohdanovce","Košice - okolie"],["Boliarov","Košice - okolie"],["Budimír","Košice - okolie"],["Bukovec","Košice - okolie"],["Bunetice","Košice - okolie"],["Buzica","Košice - okolie"],["Cestice","Košice - okolie"],["Chorváty","Košice - okolie"],["Chrastné","Košice - okolie"],["Čakanovce","Košice - okolie"],["Čaňa","Košice - okolie"],["Čečejovce","Košice - okolie"],["Čižatice","Košice - okolie"],["Debraď","Košice - okolie"],["Drienovec","Košice - okolie"],["Družstevná pri Hornáde","Košice - okolie"],["Ďurďošík","Košice - okolie"],["Ďurkov","Košice - okolie"],["Dvorníky-Včeláre","Košice - okolie"],["Geča","Košice - okolie"],["Gyňov","Košice - okolie"],["Hačava","Košice - okolie"],["Háj","Košice - okolie"],["Haniska","Košice - okolie"],["Herľany","Košice - okolie"],["Hodkovce","Košice - okolie"],["Hosťovce","Košice - okolie"],["Hrašovík","Košice - okolie"],["Hýľov","Košice - okolie"],["Janík","Košice - okolie"],["Jasov","Košice - okolie"],["Kalša","Košice - okolie"],["Kecerovce","Košice - okolie"],["Kecerovský Lipovec","Košice - okolie"],["Kechnec","Košice - okolie"],["Kokšov-Bakša","Košice - okolie"],["Komárovce","Košice - okolie"],["Kostoľany nad Hornádom","Košice - okolie"],["Košická Belá","Košice - okolie"],["Košická Polianka","Košice - okolie"],["Košické Oľšany","Košice - okolie"],["Košický Klečenov","Košice - okolie"],["Kráľovce","Košice - okolie"],["Kysak","Košice - okolie"],["Malá Ida","Košice - okolie"],["Malá Lodina","Košice - okolie"],["Medzev","Košice - okolie"],["Milhosť","Košice - okolie"],["Mokrance","Košice - okolie"],["Moldava nad Bodvou","Košice - okolie"],["Mudrovce","Košice - okolie"],["Nižná Hutka","Košice - okolie"],["Nižná Kamenica","Košice - okolie"],["Nižná Myšľa","Košice - okolie"],["Nižný Čaj","Košice - okolie"],["Nižný Klátov","Košice - okolie"],["Nižný Lánec","Košice - okolie"],["Nová Polhora","Košice - okolie"],["Nováčany","Košice - okolie"],["Nový Salaš","Košice - okolie"],["Obišovce","Košice - okolie"],["Olšovany","Košice - okolie"],["Opátka","Košice - okolie"],["Opiná","Košice - okolie"],["Paňovce","Košice - okolie"],["Peder","Košice - okolie"],["Perín-Chym","Košice - okolie"],["Ploské","Košice - okolie"],["Poproč","Košice - okolie"],["Rákoš","Košice - okolie"],["Rankovce","Košice - okolie"],["Rešica","Košice - okolie"],["Rozhanovce","Košice - okolie"],["Rudník","Košice - okolie"],["Ruskov","Košice - okolie"],["Sady nad Torysou","Košice - okolie"],["Seňa","Košice - okolie"],["Skároš","Košice - okolie"],["Slančík","Košice - okolie"],["Slanec","Košice - okolie"],["Slanská Huta","Košice - okolie"],["Slanské Nové Mesto","Košice - okolie"],["Sokoľ","Košice - okolie"],["Sokoľany","Košice - okolie"],["Svinica","Košice - okolie"],["Šemša","Košice - okolie"],["Štós","Košice - okolie"],["Trebejov","Košice - okolie"],["Trsťany","Košice - okolie"],["Trstené pri Hornáde","Košice - okolie"],["Turňa nad Bodvou","Košice - okolie"],["Turnianska Nová Ves","Košice - okolie"],["Vajkovce","Košice - okolie"],["Valaliky","Košice - okolie"],["Veľká Ida","Košice - okolie"],["Veľká Lodina","Košice - okolie"],["Vtáčkovce","Košice - okolie"],["Vyšná Hutka","Košice - okolie"],["Vyšná Kamenica","Košice - okolie"],["Vyšná Myšľa","Košice - okolie"],["Vyšný Čaj","Košice - okolie"],["Vyšný Klátov","Košice - okolie"],["Vyšný Medzev","Košice - okolie"],["Zádiel","Košice - okolie"],["Zlatá Idka","Košice - okolie"],["Žarnov","Košice - okolie"],["Ždaňa","Košice - okolie"],["Bajany","Michalovce"],["Bánovce nad Ondavou","Michalovce"],["Beša","Michalovce"],["Bracovce","Michalovce"],["Budince","Michalovce"],["Budkovce","Michalovce"],["Čečehov","Michalovce"],["Čičarovce","Michalovce"],["Čierne Pole","Michalovce"],["Drahňov","Michalovce"],["Dúbravka","Michalovce"],["Falkušovce","Michalovce"],["Hatalov","Michalovce"],["Hažín","Michalovce"],["Hnojné","Michalovce"],["Horovce","Michalovce"],["Iňačovce","Michalovce"],["Ižkovce","Michalovce"],["Jastrabie pri Michalov.","Michalovce"],["Jovsa","Michalovce"],["Kačanov","Michalovce"],["Kaluža","Michalovce"],["Kapušianske Kľačany","Michalovce"],["Klokočov","Michalovce"],["Krásnovce","Michalovce"],["Krišovská Liesková","Michalovce"],["Kusín","Michalovce"],["Lastomír","Michalovce"],["Laškovce","Michalovce"],["Lesné","Michalovce"],["Ložín","Michalovce"],["Lúčky","Michalovce"],["Malčice","Michalovce"],["Malé Raškovce","Michalovce"],["Markovce","Michalovce"],["Maťovské Vojkovce","Michalovce"],["Michalovce","Michalovce"],["Moravany","Michalovce"],["Nacina Ves","Michalovce"],["Oborín","Michalovce"],["Oreské","Michalovce"],["Palín","Michalovce"],["Pavlovce nad Uhom","Michalovce"],["Petrikovce","Michalovce"],["Petrovce nad Laborcom","Michalovce"],["Poruba pod Vihorlatom","Michalovce"],["Pozdišovce","Michalovce"],["Ptrukša","Michalovce"],["Pusté Čemerné","Michalovce"],["Rakovec nad Ondavou","Michalovce"],["Ruská","Michalovce"],["Senné","Michalovce"],["Slavkovce","Michalovce"],["Sliepkovce","Michalovce"],["Staré","Michalovce"],["Strážske","Michalovce"],["Stretava","Michalovce"],["Stretavka","Michalovce"],["Suché","Michalovce"],["Šamudovce","Michalovce"],["Trhovište","Michalovce"],["Trnava pri Laborci","Michalovce"],["Tušice","Michalovce"],["Tušická Nová Ves","Michalovce"],["Veľké Kapušany","Michalovce"],["Veľké Raškovce","Michalovce"],["Veľké Slemence","Michalovce"],["Vinné","Michalovce"],["Vojany","Michalovce"],["Voľa","Michalovce"],["Vrbnica","Michalovce"],["Vysoká nad Uhom","Michalovce"],["Zalužice","Michalovce"],["Závadka","Michalovce"],["Zbudza","Michalovce"],["Zemplínska Široká","Michalovce"],["Zemplínske Kopčany","Michalovce"],["Žbince","Michalovce"],["Baškovce","Sobrance"],["Beňatina","Sobrance"],["Bežovce","Sobrance"],["Blatná Polianka","Sobrance"],["Blatné Remety","Sobrance"],["Blatné Revištia","Sobrance"],["Bunkovce","Sobrance"],["Choňkovce","Sobrance"],["Fekišovce","Sobrance"],["Hlivištia","Sobrance"],["Horňa","Sobrance"],["Husák","Sobrance"],["Inovce","Sobrance"],["Jasenov","Sobrance"],["Jenkovce","Sobrance"],["Kolibabovce","Sobrance"],["Koňuš","Sobrance"],["Koromľa","Sobrance"],["Krčava","Sobrance"],["Kristy","Sobrance"],["Lekárovce","Sobrance"],["Nižná Rybnica","Sobrance"],["Nižné Nemecké","Sobrance"],["Orechová","Sobrance"],["Ostrov","Sobrance"],["Petrovce","Sobrance"],["Pinkovce","Sobrance"],["Podhoroď","Sobrance"],["Porostov","Sobrance"],["Porúbka","Sobrance"],["Priekopa","Sobrance"],["Remetské Hámre","Sobrance"],["Ruská Bystrá","Sobrance"],["Ruskovce","Sobrance"],["Ruský Hrabovec","Sobrance"],["Sejkov","Sobrance"],["Sobrance","Sobrance"],["Svätuš","Sobrance"],["Tašuľa","Sobrance"],["Tibava","Sobrance"],["Úbrež","Sobrance"],["Veľké Revištia","Sobrance"],["Vojnatina","Sobrance"],["Vyšná Rybnica","Sobrance"],["Vyšné Nemecké","Sobrance"],["Vyšné Remety","Sobrance"],["Záhor","Sobrance"],["Ardovo","Rožňava"],["Betliar","Rožňava"],["Bohúňovo","Rožňava"],["Bôrka","Rožňava"],["Brdárka","Rožňava"],["Bretka","Rožňava"],["Brzotín","Rožňava"],["Čierna Lehota","Rožňava"],["Čoltovo","Rožňava"],["Čučma","Rožňava"],["Dedinky","Rožňava"],["Dlhá Ves","Rožňava"],["Dobšiná","Rožňava"],["Drnava","Rožňava"],["Gemerská Hôrka","Rožňava"],["Gemerská Panica","Rožňava"],["Gemerská Poloma","Rožňava"],["Gočaltovo","Rožňava"],["Gočovo","Rožňava"],["Hanková","Rožňava"],["Henckovce","Rožňava"],["Honce","Rožňava"],["Hrhov","Rožňava"],["Hrušov","Rožňava"],["Jablonov nad Turňou","Rožňava"],["Jovice","Rožňava"],["Kečovo","Rožňava"],["Kobeliarovo","Rožňava"],["Koceľovce","Rožňava"],["Kováčová","Rožňava"],["Krásnohorská Dlhá Lúka","Rožňava"],["Krásnohorské Podhradie","Rožňava"],["Kružná","Rožňava"],["Kunova Teplica","Rožňava"],["Lipovník","Rožňava"],["Lúčka","Rožňava"],["Markuška","Rožňava"],["Meliata","Rožňava"],["Nižná Slaná","Rožňava"],["Ochtiná","Rožňava"],["Pača","Rožňava"],["Pašková","Rožňava"],["Petrovo","Rožňava"],["Plešivec","Rožňava"],["Rakovnica","Rožňava"],["Rejdová","Rožňava"],["Rochovce","Rožňava"],["Roštár","Rožňava"],["Rozložná","Rožňava"],["Rožňava","Rožňava"],["Rožňavské Bystré","Rožňava"],["Rudná","Rožňava"],["Silica","Rožňava"],["Silická Brezová","Rožňava"],["Silická Jablonica","Rožňava"],["Slavec","Rožňava"],["Slavoška","Rožňava"],["Slavošovce","Rožňava"],["Stratená","Rožňava"],["Štítnik","Rožňava"],["Vlachovo","Rožňava"],["Vyšná Slaná","Rožňava"],["Gelnica","Gelnica"],["Helcmanovce","Gelnica"],["Henclová","Gelnica"],["Hrišovce","Gelnica"],["Jaklovce","Gelnica"],["Kluknava","Gelnica"],["Kojšov","Gelnica"],["Margecany","Gelnica"],["Mníšek nad Hnilcom","Gelnica"],["Nálepkovo","Gelnica"],["Prakovce","Gelnica"],["Richnava","Gelnica"],["Smolnícka Huta","Gelnica"],["Smolník","Gelnica"],["Stará Voda","Gelnica"],["Švedlár","Gelnica"],["Úhorná","Gelnica"],["Veľký Folkmar","Gelnica"],["Závadka","Gelnica"],["Žakarovce","Gelnica"],["Arnutovce","Spišská Nová Ves"],["Betlanovce","Spišská Nová Ves"],["Bystrany","Spišská Nová Ves"],["Chrasť nad Hornádom","Spišská Nová Ves"],["Danišovce","Spišská Nová Ves"],["Harichovce","Spišská Nová Ves"],["Hincovce","Spišská Nová Ves"],["Hnilčík","Spišská Nová Ves"],["Hnilec","Spišská Nová Ves"],["Hrabušice","Spišská Nová Ves"],["Iliašovce","Spišská Nová Ves"],["Jamník","Spišská Nová Ves"],["Kaľava","Spišská Nová Ves"],["Kolinovce","Spišská Nová Ves"],["Krompachy","Spišská Nová Ves"],["Letanovce","Spišská Nová Ves"],["Lieskovany","Spišská Nová Ves"],["Markušovce","Spišská Nová Ves"],["Matejovce nad Hornádom","Spišská Nová Ves"],["Mlynky","Spišská Nová Ves"],["Odorín","Spišská Nová Ves"],["Olcnava","Spišská Nová Ves"],["Oľšavka","Spišská Nová Ves"],["Poráč","Spišská Nová Ves"],["Rudňany","Spišská Nová Ves"],["Slatvina","Spišská Nová Ves"],["Slovinky","Spišská Nová Ves"],["Smižany","Spišská Nová Ves"],["Spišská Nová Ves","Spišská Nová Ves"],["Spišské Tomášovce","Spišská Nová Ves"],["Spišské Vlachy","Spišská Nová Ves"],["Spišský Hrušov","Spišská Nová Ves"],["Teplička","Spišská Nová Ves"],["Vítkovce","Spišská Nová Ves"],["Vojkovce","Spišská Nová Ves"],["Žehra","Spišská Nová Ves"],["Bačka","Trebišov"],["Bačkov","Trebišov"],["Bara","Trebišov"],["Biel","Trebišov"],["Boľ","Trebišov"],["Borša","Trebišov"],["Boťany","Trebišov"],["Brehov","Trebišov"],["Brezina","Trebišov"],["Byšta","Trebišov"],["Cejkov","Trebišov"],["Čeľovce","Trebišov"],["Čerhov","Trebišov"],["Černochov","Trebišov"],["Čierna","Trebišov"],["Čierna nad Tisou","Trebišov"],["Dargov","Trebišov"],["Dobrá","Trebišov"],["Dvorianky","Trebišov"],["Egreš","Trebišov"],["Hraň","Trebišov"],["Hrčeľ","Trebišov"],["Hriadky","Trebišov"],["Kašov","Trebišov"],["Kazimír","Trebišov"],["Klin nad Bodrogom","Trebišov"],["Kožuchov","Trebišov"],["Kráľovský Chlmec","Trebišov"],["Kravany","Trebišov"],["Kuzmice","Trebišov"],["Kysta","Trebišov"],["Ladmovce","Trebišov"],["Lastovce","Trebišov"],["Leles","Trebišov"],["Luhyňa","Trebišov"],["Malá Tŕňa","Trebišov"],["Malé Ozorovce","Trebišov"],["Malé Trakany","Trebišov"],["Malý Horeš","Trebišov"],["Malý Kamenec","Trebišov"],["Michaľany","Trebišov"],["Nižný Žipov","Trebišov"],["Novosad","Trebišov"],["Nový Ruskov","Trebišov"],["Parchovany","Trebišov"],["Plechotice","Trebišov"],["Poľany","Trebišov"],["Pribeník","Trebišov"],["Rad","Trebišov"],["Sečovce","Trebišov"],["Sirník","Trebišov"],["Slivník","Trebišov"],["Slovenské Nové Mesto","Trebišov"],["Soľnička","Trebišov"],["Somotor","Trebišov"],["Stanča","Trebišov"],["Stankovce","Trebišov"],["Strážne","Trebišov"],["Streda nad Bodrogom","Trebišov"],["Svätá Mária","Trebišov"],["Svätuše","Trebišov"],["Svinice","Trebišov"],["Trebišov","Trebišov"],["Trnávka","Trebišov"],["Veľaty","Trebišov"],["Veľká Tŕňa","Trebišov"],["Veľké Ozorovce","Trebišov"],["Veľké Trakany","Trebišov"],["Veľký Horeš","Trebišov"],["Veľký Kamenec","Trebišov"],["Viničky","Trebišov"],["Višňov","Trebišov"],["Vojčice","Trebišov"],["Vojka","Trebišov"],["Zatín","Trebišov"],["Zbehňov","Trebišov"],["Zemplín","Trebišov"],["Zemplínska Nová Ves","Trebišov"],["Zemplínska Teplica","Trebišov"],["Zemplínske Hradište","Trebišov"],["Zemplínske Jastrabie","Trebišov"],["Zemplínsky Branč","Trebišov"]]

    var duplicateMunicipalityNames = {};
    var municipalities = [];
    var counties = {};

    for (var i = 0; i < MUNICIPALITY_TO_COUNTY.length; i++) {
        var municipality = MUNICIPALITY_TO_COUNTY[i];

        duplicateMunicipalityNames[municipality[0]] = typeof duplicateMunicipalityNames[municipality[0]] !== 'undefined';
    }

    for (var i = 0; i < MUNICIPALITY_TO_COUNTY.length; i++) {
        var municipality = MUNICIPALITY_TO_COUNTY[i];

        var searchText = replaceDiacritics(municipality[0]).toLowerCase();
        var label = municipality[0] + (duplicateMunicipalityNames[municipality[0]] ? (' (okres ' + municipality[1] + ')') : '');

        MUNICIPALITY_TO_COUNTY[i][2] = searchText.replace(/[ -\.]+/g, ' ');
        MUNICIPALITY_TO_COUNTY[i][3] = label;

        municipalities.push(label);
        counties[label] = {
            municipality: municipality[0],
            county: municipality[1]
        }
    }

    var rcAutocompleteInit = function (name) {
        var element = document.getElementById('municipality-field-' + name);

        if (element) {
            var $municipalityError = document.getElementById('municipality-error-' + name);
            var $municipalityValueInput = document.getElementById('municipality-input-' + name);
            var $countyValueInput = document.getElementById('county-input-' + name);
            var $formGroup = $(element).closest('.govuk-form-group');

            var onNotFound = function () {
                $municipalityError.style.display = 'block';

                $municipalityValueInput.value = '';
                $countyValueInput.value = '';

                $(element).addClass('autocomplete-error');
                $formGroup.addClass('govuk-form-group--error');

                return 'Mesto/obec nie je v zozname. Vyberte mesto/obec zo zoznamu.'
            };

            var onConfirm = function (value) {
                if (counties[value]) {
                    $municipalityError.style.display = 'none';
                    $municipalityValueInput.value = counties[value].municipality;
                    $countyValueInput.value = counties[value].county;

                    $(element).removeClass('autocomplete-error');
                    $formGroup.removeClass('govuk-form-group--error');
                } else {
                    onNotFound(value);
                }
            };

            var settings = {
                element: element,
                id: 'municipality-inner-' + name,
                displayMenu: 'overlay',
                showAllValues: true,
                confirmOnBlur: false,
                autoselect: true,
                dropdownArrow: function() {
                    return '<svg class="autocomplete__dropdown-arrow-down" style="top: 8px;" viewBox="0 0 512 512"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9  c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3  z"></path></svg>';
                },
                tNoResults: onNotFound,
                onConfirm: onConfirm,
                source: function (query, populateResults) {
                    var results = [];

                    if (query === '') {
                        results = municipalities
                    } else {
                        var term = replaceDiacritics(query.replace(/[ -]+/g, ' ')).toLowerCase();

                        for (var i = 0; i < municipalities.length && results.length < 50; i++) {
                            var municipality = MUNICIPALITY_TO_COUNTY[i];

                            if (municipality[3] === query) {
                                results.push(municipality[3])
                            } else {
                                var index = municipality[2].indexOf(term);

                                if (index > -1 && (index === 0 || municipality[2][index - 1] === ' ')) {
                                    results.push(municipality[3])
                                }
                            }
                        }
                    }

                    results = results.sort(function (a, b) {
                        a = replaceDiacritics(a);
                        b = replaceDiacritics(b);
                        return ((a < b) ? -1 : ((a > b) ? 1 : 0))
                    });

                    populateResults(results)
                }
            };

            accessibleAutocomplete(settings);

            document.getElementById(settings.id).addEventListener('change', function (event) {
                onConfirm(event.target.value);
            });
        }
    };

    var COUNTRY_LIST = [["AE","Spojené arabské emiráty","Spojené arabské emiráty","United Arab Emirates","United Arab Emirates"],["AF","Afganská islamská republika","Afganistan","Islamic Republic of Afghanistan","Afghanistan"],["AG","Antigua a Barbuda","Antigua a Barbuda","Antigua and Barbuda","Antigua and Barbuda"],["AI","Anguilla","Anguilla","Anguilla","Anguilla"],["AL","Albánska republika","Albánsko","Republic of Albania","Albania"],["AM","Arménska republika","Arménsko","Republic of Armenia","Armenia"],["AN","Holandské Antily","Holandské Antily","Netherlands Antilles","Netherlands Antilles"],["AO","Angolská republika","Angola","Republic of Angola","Angola"],["AQ","Antarktída","Antarktída","Antarctica","Antarctica"],["AR","Argentínska republika","Argentína","Argentine Republic","Argentina"],["AS","Teritórium Americkej Samoy","Americká Samoa","Territory of American Samoa","American Samoa"],["AT","Rakúska republika","Rakúsko","Republic of Austria","Austria"],["AU","Austrálsky zväz","Austrália","Australia","Australia"],["AW","Aruba","Aruba","Aruba","Aruba"],["AX","Alandy","Alandy","Aland Islands","Aland Islands"],["AZ","Azerbajdžanská republika","Azerbajdžan","Republic of Azerbaijan","Azerbaijan"],["BA","Bosna a Hercegovina","Bosna a Hercegovina","Bosnia and Herzegovina","Bosnia and Herzegovina"],["BB","Barbados","Barbados","Barbados","Barbados"],["BD","Bangladéšska ľudová republika","Bangladéš","People`s Republic of Bangladesh","Bangladesh"],["BE","Belgické kráľovstvo","Belgicko","Kingdom of Belgium","Belgium"],["BF","Burkina Faso","Burkina","Burkina Faso","Burkina Faso"],["BG","Bulharská republika","Bulharsko","Republic of Bulgaria","Bulgaria"],["BH","Bahrajnské kráľovstvo","Bahrajn","Kingdom of Bahrain","Bahrain"],["BI","Burundská republika","Burundi","Republic of Burundi","Burundi"],["BJ","Beninská republika","Benin","Republic of Benin","Benin"],["BM","Bermudy","Bermudy","Bermuda","Bermuda"],["BN","Brunejsko-darussalamský štát","Brunej","Brunei Darussalam","Brunei Darussalam"],["BO","Bolívijský mnohonárodný štát","Bolívia","Plurinational State of Bolivia","Bolivia (Plurinat.State)"],["BR","Brazílska federatívna republika","Brazília","Federative Republic of Brazil","Brazil"],["BS","Bahamské spoločenstvo","Bahamy","Commonwealth of The Bahamas","Bahamas"],["BT","Bhutánske kráľovstvo","Bhután","Kingdom of Bhutan","Bhutan"],["BV","Bouvetov ostrov","Bouvetov ostrov","Bouvet Island","Bouvet Island"],["BW","Botswanská republika","Botswana","Republic of Botswana","Botswana"],["BY","Bieloruská republika","Bielorusko","Republic of Belarus","Belarus"],["BZ","Belize","Belize","Belize","Belize"],["CA","Kanada","Kanada","Canada","Canada"],["CC","Teritórium Kokosových ostrovov","Kokosové ostrovy","Territory of Cocos (Keeling) Islands","Cocos (Keeling) Islands"],["CD","Konžská demokratická republika","Kongo (býv. Zair)","Democratic Republic of the Congo","Dem.Rep. of the Congo"],["CF","Stredoafrická republika","Stredoafrická republika","Central African Republic","Central African Rep."],["CG","Konžská republika","Kongo","Republic of the Congo","Congo"],["CH","Švajčiarska konfederácia","Švajčiarsko","Swiss Confederation","Switzerland"],["CI","Republika Pobrežia slonoviny","Pobrežie slonoviny","Republic of Côte d'Ivoire","Côte d'Ivoire"],["CK","Cookove ostrovy","Cookove ostrovy","Cook Islands","Cook Islands"],["CL","Čilská republika","Čile","Republic of Chile","Chile"],["CM","Kamerunská republika","Kamerun","Republic of Cameroon","Cameroon"],["CN","Čínska ľudová republika","Čína","People's Republic of China","China"],["CO","Kolumbijská republika","Kolumbia","Republic of Colombia","Colombia"],["CR","Kostarická republika","Kostarika","Republic of Costa Rica","Costa Rica"],["CU","Kubánska republika","Kuba","Republic of Cuba","Cuba"],["CV","Kapverdská republika","Kapverdy","Republic of Cabo Verde","Cabo Verde"],["CX","Teritórium Vianočného ostrova","Vianočný ostrov","Christmas Island Territory","Christmas Island"],["CY","Cyperská republika","Cyprus","Republic of Cyprus","Cyprus"],["CZ","Česká republika","Česko","Czech Republic","Czechia"],["DE","Nemecká spolková republika","Nemecko","Federal Republic of Germany","Germany"],["DJ","Džibutská republika","Džibutsko","Republic of Djibouti","Djibouti"],["DK","Dánske kráľovstvo","Dánsko","Kingdom of Denmark","Denmark"],["DM","Dominické spoločenstvo","Dominika","Commonwealth of Dominica","Dominica"],["DO","Dominikánska republika","Dominikánska republika","Dominican Republic","Dominican republic"],["DZ","Alžírska demokratická ľudová republika","Alžírsko","People`s Democratic Republic of Algeria","Algeria"],["EC","Ekvádorská republika","Ekvádor","Republic of Ecuador","Ecuador"],["EE","Estónska republika","Estónsko","Republic of Estonia","Estonia"],["EG","Egyptská arabská republika","Egypt","Arab Republic of Egypt","Egypt"],["EH","Západná Sahara","Západná Sahara","Western Sahara","Western Sahara"],["ER","Eritrejský štát","Eritrea","Eritrea","The State of Eritrea"],["ES","Španielske kráľovstvo","Španielsko","Kingdom of Spain","Spain"],["ET","Etiópia","Etiópia","Ethiopia","Ethiopia"],["FI","Fínska republika","Fínsko","Republic of Finland","Finland"],["FJ","Fidžijská republika","Fidži","Republic of Fiji","Fiji"],["FK","Falklandské ostrovy","Falklandy","Falkland Islands (Malvinas)","Falkland Isl. (Malvinas)"],["FM","Mikronézske federatívne štáty","Mikronézia","Federated States of Micronesia","Micronesia (Fed.St. of)"],["FO","Faerské ostrovy","Faerské ostrovy","Faroe Islands","Faroe Islands"],["FR","Francúzska republika","Francúzsko","French Republic","France"],["GA","Gabonská republika","Gabon","Gabonese Republic","Gabon"],["GB","Spojené kráľovstvo Veľkej Británie a Severného Írska","Spojené kráľovstvo","United Kingdom of Great Britain and Northern Ireland","United Kingd.of GB a.NI."],["GD","Grenada","Grenada","Grenada","Grenada"],["GE","Gruzínsko","Gruzínsko","Georgia","Georgia"],["GF","Francúzska Guyana","Francúzska Guyana","French Guiana","French Guiana"],["GG","Guernsey","Guernsey","Guernsey","Guernsey"],["GH","Ghanská republika","Ghana","Republic of Ghana","Ghana"],["GI","Gibraltár","Gibraltár","Gibraltar","Gibraltar"],["GL","Grónsko","Grónsko","Greenland","Greenland"],["GM","Gambijská republika","Gambia","Republic of the Gambia","Gambia"],["GN","Guinejská republika","Guinea","Republic of Guinea","Guinea"],["GP","Guadeloup","Guadeloupe","Guadeloupe","Guadeloupe"],["GQ","Republika Rovníkovej Guiney","Rovníková Guinea","Republic of Equatorial Guinea","Equatorial Guinea"],["GR","Grécka republika","Grécko","Hellenic Republic","Greece"],["GS","Južná Georgia a Južné Sandwichove ostrovy","Južná Georgia a Južné Sandwichove ostrovy","South Georgia and the South Sandwich Islands","S.Georgia, s.Sand. Isl."],["GT","Guatemalská republika","Guatemala","Republic of Guatemala","Guatemala"],["GU","Guamské teritórium","Guam","Territory of Guam","Guam"],["GW","Guinejsko-bissauská republika","Guinea-Bissau","Republic of Guinea-Bissau","Guinea-Bissau"],["GY","Guyanská kooperatívna republika","Guyana","Co-operative Republic of Guyana","Guyana"],["HK","Hongkong","Hongkong","Hong Kong Special Administrative Region of China","Hong Kong"],["HM","Teritórium Heardovho ostrova a Macdonaldových ostrovov","Heard.ostr.a Macd.ostr.","Territory of Heard and McDonald Islands","Heard Isl.and McDon.Isl."],["HN","Honduraská republika","Honduras","Republic of Honduras","Honduras"],["HR","Chorvátska republika","Chorvátsko","Republic of Croatia","Croatia"],["HT","Haitská republika","Haiti","Republic of Haiti","Haiti"],["HU","Maďarsko","Maďarsko","Hungary","Hungary"],["ID","Indonézska republika","Indonézia","Republic of Indonesia","Indonesia"],["IE","Írsko","Írsko","Ireland","Ireland"],["IL","Izraelský štát","Izrael","State of Israel","Israel"],["IM","Ostrov Man","Man","Isle of Man, Dependency of the Crown","Isle of Man"],["IN","Indická republika","India","Republic of India","India"],["IO","Britské indickooceánske územie","Britské indickooceánske územie","British Indian Ocean Territory","British Ind.Ocean Terr."],["IQ","Iracká republika","Irak","Republic of Iraq","Iraq"],["IR","Iránska islamská republika","Irán","Islamic Republic of Iran","Iran,Islamic Republic of"],["IS","Islandská republika","Island","Republic of Iceland","Iceland"],["IT","Talianska republika","Taliansko","Republic of Italy","Italy"],["JE","Jersey","Jersey","Jersey","Jersey"],["JM","Jamajka","Jamajka","Jamaica","Jamaica"],["JO","Jordánske hášimovské kráľovstvo","Jordánsko","Hashemite Kingdom of Jordan","Jordan"],["JP","Japonsko","Japonsko","Japan","Japan"],["KE","Kenská republika","Keňa","Republic of Kenya","Kenya"],["KG","Kirgizská republika","Kirgizsko","Kyrgyz Republic","Kyrgyzstan"],["KH","Kambodžské kráľovstvo","Kambodža","Kingdom of Cambodia","Cambodia"],["KI","Kiribatská republika","Kiribati","Republic of Kiribati","Kiribati"],["KM","Komorský zväz","Komory","Union of the Comoros","Comoros"],["KN","Federácia Svätého Krištofa a Nevisu","Svätý Krištof a Nevis","Saint Kitts and Nevis","Saint Kitts and Nevis"],["KP","Kórejská ľudovodemokratická republika","Kórejská ľudovodemokratická republika","Democratic Peoples Republic of Korea","Dem.Peopl.Rep. of Korea"],["KR","Kórejská republika","Kórejská republika","Republic of Korea","Korea, Republic of"],["KW","Kuvajtský štát","Kuvajt","State of Kuwait","Kuwait"],["KY","Kajmanie ostrovy","Kajmanie ostrovy","Cayman Islands","Cayman Islands"],["KZ","Kazašská republika","Kazachstan","Republic of Kazakhstan","Kazakhstan"],["LA","Laoská ľudovodemokratická republika","Laos","Lao People's Democratic Republic","Lao People's Dem. Rep."],["LB","Libanonská republika","Libanon","Lebanese Republic","Lebanon"],["LC","Svätá Lucia","Svätá Lucia","Saint Lucia","Saint Lucia"],["LI","Lichtenštajnské kniežatstvo","Lichtenštajnsko","Principality of Liechtenstein","Liechtenstein"],["LK","Srílanská demokratická socialistická republika","Srí Lanka","Democratic Socialist Republic of Sri Lanka","Sri Lanka"],["LR","Libérijská republika","Libéria","Republic of Liberia","Liberia"],["LS","Lesothské kráľovstvo","Lesotho","Kingdom of Lesotho","Lesotho"],["LT","Litovská republika","Litva","Republic of Lithuania","Lithuania"],["LU","Luxemburské veľkovojvodstvo","Luxembursko","Grand Duchy of Luxembourg","Luxembourg"],["LV","Lotyšská republika","Lotyšsko","Republic of Latvia","Latvia"],["LY","Líbya","Líbya","Libya","Libya"],["MA","Marocké kráľovstvo","Maroko","Kingdom of Morocco","Morocco"],["MC","Monacké kniežatstvo","Monako","Principality of Monaco","Monaco"],["MD","Moldavská republika","Moldavsko","Republic of Moldova","Republic of Moldova"],["ME","Čierna Hora","Čierna Hora","Montenegro","Montenegro"],["MG","Madagaskarská republika","Madagaskar","Republic of Madagascar","Madagascar"],["MH","Republika Marshallových ostrovov","Marshallove ostrovy","Republic of the Marshall Islands","Marshall Islands"],["MK","Severomacedónska republika","Severné Macedónsko","the Republic of North Macedonia","North Macedonia"],["ML","Malijská republika","Mali","Republic of Mali","Mali"],["MM","Mjanmarská zväzová republika","Mjanmarsko","Republic of the Union of Myanmar","Myanmar"],["MN","Mongolsko","Mongolsko","Mongolia","Mongolia"],["MO","Macao","Macao","Macao Special Administrative Region of China","Macao"],["MP","Spoločenstvo ostrovov Severné Mariány","Severné Mariány","Commonwealth of the Northern Mariana Islands","Northern Mariana Islands"],["MQ","Martinik","Martinik","Martinique","Martinique"],["MR","Mauritánska islamská republika","Mauritánia","Islamic Republic of Mauritania","Mauritania"],["MS","Montserrat","Montserrat","Montserrat","Montserrat"],["MT","Maltská republika","Malta","Republic of Malta","Malta"],["MU","Maurícijská republika","Maurícius","Republic of Mauritius","Mauritius"],["MV","Maldivská republika","Maldivy","Republic of Maldives","Maldives"],["MW","Malawijská republika","Malawi","Republic of Malawi","Malawi"],["MX","Spojené štáty mexické","Mexiko","United Mexican States","Mexico"],["MY","Malajzia","Malajzia","Malaysia","Malaysia"],["MZ","Mozambická republika","Mozambik","Republic of Mozambique","Mozambique"],["NA","Namíbijská republika","Namíbia","Republic of Namibia","Namibia"],["NC","Nová Kaledónia","Nová Kaledónia","New Caledonia","New Caledonia"],["NE","Nigerská republika","Niger","Republic of the Niger","Niger"],["NF","Teritórium ostrova Norfolk","Norfolk","Territory of Norfolk Island","Norfolk Island"],["NG","Nigérijská federatívna republika","Nigéria","Federal Republic of Nigeria","Nigeria"],["NI","Nikaragujská republika","Nikaragua","Republic of Nicaragua","Nicaragua"],["NL","Holandské kráľovstvo","Holandsko","Kingdom of the Netherlands","Netherlands"],["NO","Nórske kráľovstvo","Nórsko","Kingdom of Norway","Norway"],["NP","Nepálská federatívna demokratická republika","Nepál","Federal Democratic Republic of Nepal","Nepal"],["NR","Nauruská republika","Nauru","Republic of Nauru","Nauru"],["NU","Niue","Niue","Niue","Niue"],["NZ","Nový Zéland","Nový Zéland","New Zealand","New Zealand"],["OM","Ománsky sultanát","Omán","Sultanate of Oman","Oman"],["PA","Panamská republika","Panama","Republic of Panama","Panama"],["PE","Peruánska republika","Peru","Republic of Peru","Peru"],["PF","Francúzska Polynézia","Francúzska Polynézia","French Polynesia","French Polynesia"],["PG","Nezávislý štát Papua-Nová Guinea","Papua-Nová Guinea","Independent State of Papua New Guinea","Papua New Guinea"],["PH","Filipínska republika","Filipíny","Republic of the Philippines","Philippines"],["PK","Pakistanská islamská republika","Pakistan","Islamic Republic of Pakistan","Pakistan"],["PL","Poľská republika","Poľsko","Republic of Poland","Poland"],["PM","Saint Pierre a Miquelon","Saint Pierre a Miquelon","Saint Pierre and Miquelon","St. Pierre and Miquelon"],["PN","Pitcairnove ostrovy","Pitcairnove ostrovy","Pitcairn Islands","Pitcairn"],["PR","Portorické spoločenstvo","Portoriko","Puerto Rico","Puerto Rico"],["PS","Palestínsky štát","Palestína","The State of Palestine","Palestine, State of"],["PT","Portugalská republika","Portugalsko","Portuguese Republic","Portugal"],["PW","Palauská republika","Palau","Republic of Palau","Palau"],["PY","Paraguajská republika","Paraguaj","Republic of Paraguay","Paraguay"],["QA","Katarský štát","Katar","State of Qatar","Qatar"],["RE","Réunion","Réunion","Réunion","Réunion"],["RO","Rumunsko","Rumunsko","Romania","Romania"],["RS","Srbská republika","Srbsko","Republic of Serbia","Serbia"],["RU","Ruská federácia","Rusko","Russian Federation","Russian Federation"],["RW","Rwandská republika","Rwanda","Republic of Rwanda","Rwanda"],["SA","Saudskoarabské kráľovstvo","Saudská Arábia","Kingdom of Saudi Arabia","Saudi Arabia"],["SB","Šalamúnove ostrovy","Šalamúnove ostrovy","Solomon Islands","Solomon Islands"],["SC","Seychelská republika","Seychely","Republic of Seychelles","Seychelles"],["SD","Sudánska republika","Sudán","Republic of the Sudan","Sudan"],["SE","Švédske kráľovstvo","Švédsko","Kingdom of Sweden","Sweden"],["SG","Singapurská republika","Singapur","Republic of Singapore","Singapore"],["SH","Svätá Helena, Ascension a Tristan da Cunha","Svätá Helena, Ascension a Tristan da Cunha","Saint Helena, Ascension and Tristan da Cunha","St.Helena,Asc,Trist.daC."],["SI","Slovinská republika","Slovinsko","Republic of Slovenia","Slovenia"],["SJ","Svalbard a Jan Mayen","Svalbard a Jan Mayen","Svalbard and Jan Mayen","Svalbard and Jan Mayen"],["SK","Slovenská republika","Slovensko","Slovak Republic","Slovakia"],["SL","Sierraleonská republika","Sierra Leone","Republic of Sierra Leone","Sierra Leone"],["SM","Sanmarínska republika","San Maríno","Republic of San Marino","San Marino"],["SN","Senegalská republika","Senegal","Republic of Senegal","Senegal"],["SO","Somálska federatívna republika","Somálsko","Federal Republic of Somalia","Somalia"],["SR","Surinamská republika","Surinam","Republic of Suriname","Suriname"],["ST","Demokratická republika Svätého Tomáša a Princovho ostrova","Sv. Tomáš a Princov ostrov","Democratic Republic of Sao Tome and Principe","Sao Tome and Principe"],["SU","Spoločenstvo nezávislých štátov","Spoločenstvo nezávislých štátov","Commonwealth of Independent States","CIS"],["SV","Salvádorská republika","Salvádor","Republic of El Salvador","El Salvador"],["SY","Sýrska arabská republika","Sýria","Syrian Arab Republic","Syrian Arab Republic"],["SZ","Eswatinské kráľovstvo","Eswatini","Kingdom of Eswatini","Eswatini"],["TC","Ostrovy Turks a Caicos","Turks a Caicos","Turks and Caicos Islands","Turks and Caicos Islands"],["TD","Čadská republika","Čad","Republic of Chad","Chad"],["TF","Francúzske južné a antarktické územia","Francúzske južné územia","French Southern Territories","French Southern Territ."],["TG","Togská republika","Togo","Togolese Republic","Togo"],["TH","Thajské kráľovstvo","Thajsko","Kingdom of Thailand","Thailand"],["TJ","Tadžická republika","Tadžikistan","Republic of Tajikistan","Tajikistan"],["TK","Tokelauské ostrovy","Tokelau","Tokelau Islands","Tokelau"],["TL","Východotimorská demokratická republika","Východný Timor","Democratic Republic of Timor-Leste","Timor-Leste"],["TM","Turkménsko","Turkménsko","Turkmenistan","Turkmenistan"],["TN","Tuniská republika","Tunisko","Republic of Tunisia","Tunisia"],["TO","Tongské kráľovstvo","Tonga","Kingdom of Tonga","Tonga"],["TR","Turecká republika","Turecko","Republic of Turkey","Turkey"],["TT","Republika Trinidadu a Tobaga","Trinidad a Tobago","Republic of Trinidad and Tobago","Trinidad and Tobago"],["TV","Tuvalu","Tuvalu","Tuvalu","Tuvalu"],["TW","Čínska republika","Taiwan","Republic of China","Taiwan"],["TZ","Tanzánijská zjednotená republika","Tanzánia","United Republic of Tanzania","United Rep.of Tanzania"],["UA","Ukrajina","Ukrajina","Ukraine","Ukraine"],["UG","Ugandská republika","Uganda","Republic of Uganda","Uganda"],["UM","Menšie odľahlé ostrovy Spojených štátov","Menšie odľahlé ostr.USA","United States Minor Outlying Islands","US Minor Outlying Isl."],["US","Spojené štáty americké","Spojené štáty, USA","United States of America","United States of America"],["UY","Uruguajská východná republika","Uruguaj","Eastern Republic of Uruguay","Uruguay"],["UZ","Uzbecká republika","Uzbekistan","Republic of Uzbekistan","Uzbekistan"],["VA","Svätá Stolica (Vatikánsky mestský štát)","Vatikán","Holy See","Holy See"],["VC","Svätý Vincent a Grenadíny","Sv. Vincent a Grenadíny","Saint Vincent and the Grenadines","St.Vincent,the Grenadin."],["VE","Venezuelská bolívarovská republika","Venezuela","Bolivarian Republic of Venezuela","Venezuela (Bol.Rep.of)"],["VG","Britské Panenské ostrovy","Britské Panenské ostrovy","British Virgin Islands","Virgin Islands, British"],["VI","Panenské ostrovy Spojených štátov","Panenské ostrovy Spojených štátov","Virgin Islands of the United States","Virgin Islands of the US"],["VN","Vietnamská socialistická republika","Vietnam","Socialist Republic of Viet Nam","Viet Nam"],["VU","Vanuatská republika","Vanuatu","Republic of Vanuatu","Vanuatu"],["WF","Wallis a Futuna","Wallis a Futuna","Wallis and Futuna","Wallis and Futuna"],["WS","Samojský nezávislý štát","Samoa","Independent State of Samoa","Samoa"],["YE","Jemenská republika","Jemen","Republic of Yemen","Yemen"],["YT","Mayotte","Mayotte","Mayotte","Mayotte"],["ZA","Juhoafrická republika","Južná Afrika","Republic of South Africa","South Africa"],["ZM","Zambijská republika","Zambia","Republic of Zambia","Zambia"]];

    var countries = [];
    var countryStates = {};

    for (var i = 0; i < COUNTRY_LIST.length; i++) {
        var country = COUNTRY_LIST[i];

        COUNTRY_LIST[i][5] = replaceDiacritics([country[1], country[2], country[3], country[4]].join(' ')).toLowerCase().replace(/[ -\.]+/g, ' ');

        countries.push(country[2]);

        countryStates[replaceDiacritics(country[2]).toLowerCase()] = country[0];
    }

    var rcCountryAutocompleteInit = function (name, disableDropdownArrow) {
        var element = document.getElementById('country-field-' + name);

        if (element) {
            var $countryError = document.getElementById('country-error-' + name);
            var $countryInput = document.getElementById('country-input-' + name);
            var $formGroup = $(element).closest('.govuk-form-group');

            var onNotFound = function () {
                $countryError.style.display = 'block';
                $('.js-when-unsafe').hide();
                $('.js-when-safe').hide();
                $countryInput.value = '';
                $(element).addClass('autocomplete-error');
                $formGroup.addClass('govuk-form-group--error');

                return 'Krajina nie je v zozname';
            };

            var onConfirm = function (value) {
                value = replaceDiacritics(value).toLowerCase();

                if (countryStates[value]) {
                    $countryError.style.display = 'none';

                    $countryInput.value = countryStates[value];
                    $(element).removeClass('autocomplete-error');
                    $formGroup.removeClass('govuk-form-group--error');
                } else {
                    onNotFound(value);
                }
            };

            var settings = {
                element: element,
                id: 'country-inner-' + name,
                displayMenu: 'overlay',
                showAllValues: true,
                confirmOnBlur: false,
                autoselect: true,
                dropdownArrow: function() {
                    if (disableDropdownArrow) {
                        return '';
                    }

                    return '<svg class="autocomplete__dropdown-arrow-down" style="top: 8px;" viewBox="0 0 512 512"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9  c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3  z"></path></svg>';
                },
                tNoResults: onNotFound,
                onConfirm: onConfirm,
                source: function (query, populateResults) {
                    var results = [];

                    if (query === '') {
                        results = countries
                    } else {
                        var term = replaceDiacritics(query.replace(/[ -]+/g, ' ')).toLowerCase();

                        for (var i = 0; i < countries.length && results.length < 50; i++) {
                            var country = COUNTRY_LIST[i];

                            if (country[2] === query) {
                                results.push(country[2]);
                            } else {
                                var index = country[5].indexOf(term);

                                if (index > -1 && (index === 0 || country[5][index - 1] === ' ')) {
                                    results.push(country[2]);
                                }
                            }
                        }
                    }

                    results = results.sort(function (a, b) {
                        a = replaceDiacritics(a);
                        b = replaceDiacritics(b);
                        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
                    });

                    populateResults(results);
                }
            };

            accessibleAutocomplete(settings);

            document.getElementById(settings.id).addEventListener('change', function (event) {
                onConfirm(event.target.value);
            });
        }
    }

    $(document).ready(function() {
        var isInTestMode = window.location.href.indexOf('test=nedasavycentrovat') > -1;

        var $otherCountrieslabel = $('.js-other-countries-label');
        var $permanentAddressFields = $('.js-uc-permanent-fields');
        var $form = $('.js-uc-form');
        var $window = $(window);
        var countryLastIndex = 1;


        function showHideOtherCountriesLabel() {
            if ($('.js-uc-remove-country').length === 0) {
                $otherCountrieslabel.hide();
            }
            else {
                $otherCountrieslabel.show();
            }
        }

        function formData() {
            var result = {
                people: {},
                otherCountries: [],
                tos: 'no',
                confirm: 'no'
            };

            var personFields = ['first-name', 'last-name', 'birth-number', 'insurance', 'dob-day', 'dob-month', 'dob-year', 'id-type', 'id-slovak', 'id-foreign'];

            $.each($form.serializeArray(), function(index, item) {
               if ('input-autocomplete' === item.name) {
                   return;
               }

                if ('household-members-count' === item.name) {
                    result['household-members-count'] = item.value.replace(/[^0-9]/g, '');
                    return
                }

                if ('phone' === item.name) {
                    result['phone'] = item.value.replace(/[ \-\(\)]/g, '');
                    return;
                }

                if (item.name.indexOf('country-other-') === 0) {
                    result.otherCountries.push({
                        id: item.name.split('country-other-')[1],
                        name: item.value
                    });
                    return;
                }

               var personFieldMatched = false;

               $.each(personFields, function(j, personFieldName) {
                   if (item.name.indexOf(personFieldName) === 0) {
                       personFieldMatched = true;

                       var key = item.name.split(personFieldName + '-')[1];

                       if (!result.people[key]) {
                           result.people[key] = {
                               insurance: '',
                               id: '',
                           };
                       }

                       result.people[key][personFieldName] = item.value;
                   }
               })

                if (personFieldMatched) {
                    return;
                }

                result[item.name] = item.value;
            });

            $.each(result.people, function(key, person) {
                var id = '' + result.people[key]['id-' + result.people[key]['id-type']];
                if (result.people[key]['id-type'] === 'slovak') {
                    id = id.replace(/[\/ ]/g, '');
                }
                result.people[key]['id'] = id;
                delete result.people[key]['id-slovak'];
                delete result.people[key]['id-foreign'];
            });

            return result;
        }

        function invalidDateParts(data, prefix) {
            var day = parseInt(data[prefix + '-day']);
            var month = parseInt(data[prefix + '-month']);
            var year = parseInt(data[prefix + '-year']);

            var result = [];

            if (isNaN(day) || day < 1 || day > 31) {
                result.push('day');
            }

            if (isNaN(month) || month < 1 || month > 12) {
                result.push('month');
            }

            if (isNaN(year) || year < 1900 || year > 2030) {
                result.push('year');
            }

            return result;
        }

        function isValidRcDatePart(rc) {
            return validRcDatePart(rc).length === 3;
        }

        function validRcDatePart(rc) {
            var year = parseInt(rc.substring(0, 2));
            var month = parseInt(rc.substring(2, 4)) % 50;
            var day = parseInt(rc.substring(4, 6));
            var century;

            if (rc.length === 10) {
                if (year < 54)
                {
                    century = 2000;
                }
                else {
                    century = 1900;
                }
            }

            if (rc.length === 9) {
                if (year < 54) {
                    century = 1900;
                }
                else {
                    return [];
                }
            }

            year += century;

            var maxNumberOfDays = (new Date(year, month, 0)).getDate();

            if (month === 0 || month > 12) {
                return [];
            }

            if (day === 0 || day > maxNumberOfDays) {
                return [];
            }

            return [day, month, year];
        }

        function isValidPersonId(idType, id) {
            if (idType === 'foreign') {
                return '' !== id;
            }

            if (!id.match(/^[0-9]{9,10}$/)) {
                return false;
            }

            if (id.length === 10) {
                // BIC
                if (id[2] === '7') {
                    return parseInt(id) % 11 === 0;
                }

                // 10 miestne rodne cislo
                return parseInt(id) % 11 === 0 && isValidRcDatePart(id);
            }

            // 9 miestne rodne cislo
            if (id.length === 9) {
                return isValidRcDatePart(id);
            }

            return false;
        }

        function isValidPhoneNumber(phoneNumber) {
            return null !== phoneNumber.match(/^(\+|00)\d{8}\d*$/);
        }

        function isFormValid() {
            var data = formData();
            var isValid = true;

            $form.find('.govuk-input--error').removeClass('govuk-input--error');
            $form.find('.govuk-form-group--error').removeClass('govuk-form-group--error');
            $form.find('.autocomplete-error').removeClass('autocomplete-error');
            $form.find('.govuk-error-message').hide();

            isValid &= toggleAutoselectFormError('country', 'uc-country', '' !== data['country-arrival']);
            isValid &= toggleAutoselectFormError('municipality', 'uc-isolation-municipality', '' !== data['isolation-municipality']);
            isValid &= toggleDateFormError('uc-arrival-date', invalidDateParts(data, 'arrival'));
            isValid &= toggleInputFormError('uc-phone', isValidPhoneNumber(data['phone']));
            isValid &= toggleInputFormError('uc-email', '' !== data['email']);

            isValid &= toggleAutoselectFormError('municipality', 'uc-isolation-municipality', '' !== data['isolation-municipality']);
            isValid &= toggleInputFormError('uc-isolation-street', '' !== data['isolation-street']);
            isValid &= toggleInputFormError('uc-isolation-house-number', '' !== data['isolation-house-number']);
            isValid &= toggleInputFormError('uc-isolation-zip', '' !== data['isolation-zip']);
            isValid &= toggleInputFormError('uc-tos', 'yes' === data['tos']);
            isValid &= toggleInputFormError('uc-confirm', 'yes' === data['confirm']);

            // if (data['permanent-address'] === 'other-than-isolation') {
            //     isValid &= toggleAutoselectFormError('municipality', 'uc-permanent-municipality', '' !== data['permanent-municipality']);
            //     isValid &= toggleInputFormError('uc-permanent-street', '' !== data['permanent-street']);
            //     isValid &= toggleInputFormError('uc-permanent-house-number', '' !== data['permanent-house-number']);
            //     isValid &= toggleInputFormError('uc-permanent-zip', '' !== data['permanent-zip']);
            // }

            $.each(data.otherCountries, function(i, country) {
                isValid &= toggleAutoselectFormError('country', 'other-' + country.id, '' !== country.name);
            });

            $.each(data.people, function(personId, person) {
                isValid &= toggleInputFormError('uc-first-name-' + personId, '' !== person['first-name']);
                isValid &= toggleInputFormError('uc-last-name-' + personId, '' !== person['last-name']);
                isValid &= toggleInputFormError('uc-birth-number-' + personId, '' !== person['birth-number']);
                isValid &= toggleInputFormError('uc-insurance-' + personId, '' !== person['insurance']);
                isValid &= toggleIdFormError('uc-id', person['id-type'], personId, isValidPersonId(person['id-type'], person.id));
                isValid &= toggleDateFormError('uc-dob', invalidDateParts(person, 'dob'), personId);
            });

            return isValid;
        }

        function toggleIdFormError(prefix, idType, suffix, isValid) {
            var $error = $('#' + prefix + '-' + suffix + '-error');
            var $field = $('#' + prefix + '-' + idType + '-' + suffix);
            var $formGroup = $field.closest('.govuk-form-group');

            if (isValid) {
                $error.hide();
                $field.removeClass('govuk-input--error');
                $formGroup.removeClass('govuk-form-group--error');
            }
            else {
                $error.show();
                $field.addClass('govuk-input--error');
                $formGroup.addClass('govuk-form-group--error');
            }

            return isValid;
        }

        function toggleInputFormError(fieldId, isValid) {
            var $error = $('#' + fieldId + '-error');
            var $field = $('#' + fieldId);
            var $formGroup = $error.closest('.govuk-form-group');

            if (isValid) {
                $error.hide();
                $field.removeClass('govuk-input--error');
                $formGroup.removeClass('govuk-form-group--error');
            }
            else {
                $error.show();
                $field.addClass('govuk-input--error');
                $formGroup.addClass('govuk-form-group--error');
            }

            return isValid;
        }

        function toggleDateFormError(prefix, invalidParts, suffix) {
            suffix = suffix ? ('-' + suffix) : '';
            var $error = $('#' + prefix + suffix + '-error');
            var $formGroup = $error.closest('.govuk-form-group');

            $form.find('#' + prefix + suffix).find('input').removeClass('govuk-input--error');

            if (invalidParts.length > 0) {
                $error.show();

                $.each(invalidParts, function(i, part) {
                   $form.find('#' + prefix + '-' + part + suffix).addClass('govuk-input--error');
                });

                $formGroup.addClass('govuk-form-group--error');

                return false;
            }
            else {
                $formGroup.removeClass('govuk-form-group--error');
                $error.hide();
                return true;
            }
        }

        function toggleAutoselectFormError(prefix, fieldId, isValid) {
            var $error = $('#' + prefix + '-error' + '-' + fieldId);
            var $wrapper = $('#' + prefix + '-field' + '-' + fieldId);
            var $formGroup = $wrapper.closest('.govuk-form-group');

            if (isValid) {
                $error.hide();
                $wrapper.removeClass('autocomplete-error');
                $formGroup.removeClass('govuk-form-group--error');
            }
            else {
                $error.show();
                $wrapper.addClass('autocomplete-error');
                $formGroup.addClass('govuk-form-group--error');
            }

            return isValid;
        }

        var rcOtherCountryTemplate = '<div class="govuk-form-group govuk-!-margin-bottom-3">\n' +
            '                        <div><span class="govuk-error-message" id="country-error-$id"\n' +
            '                                   style="display: none;">Vyberte krajinu zo zoznamu.</span></div>\n' +
            '                        <div class="uc-country-holder">\n' +
            '                            <input type="hidden" name="country-$id" id="country-input-$id">\n' +
            '                            <div id="country-field-$id"></div>\n' +
            '                            <button class="govuk-button govuk-button--secondary js-uc-remove-country uc-remove-country">\n' +
            '                                X\n' +
            '                            </button>\n' +
            '                        </div>\n' +
            '                    </div>';

        $('body')
            .on('click', '.js-uc-add-country', function(event) {
                event.preventDefault();

                var countryId = 'other-' + countryLastIndex;
                $(this).before(rcOtherCountryTemplate.replace(/\$id/g, countryId));
                rcCountryAutocompleteInit(countryId, true);

                showHideOtherCountriesLabel();

                countryLastIndex++;
            })
            .on('click', '.js-uc-remove-country', function(event) {
                event.preventDefault();

                $(this).closest('.govuk-form-group').remove();

                showHideOtherCountriesLabel();
            })
            .on('change', '.js-uc-permanent-type', function() {
                if ('other-than-isolation' === $('[name=permanent-address]:checked').val()) {
                    $permanentAddressFields.show();
                }
                else {
                    $permanentAddressFields.hide();
                }
            });

        var wasDobEntered = false;

        $('#uc-dob-day-1, #uc-dob-month-1, #uc-dob-year-1').on('input', function() {
            wasDobEntered = true;
        });

        $('#uc-id-slovak-1').on('input', function() {
            if (!wasDobEntered) {
                var rc = $(this).val().replace(/[ \/]/g, '');

                if (isValidPersonId('slovak', rc)) {
                    var dateParts = validRcDatePart(rc);

                    if (dateParts.length === 3) {
                        $('#uc-dob-day-1').val(dateParts[0]);
                        $('#uc-dob-month-1').val(dateParts[1]);
                        $('#uc-dob-year-1').val(dateParts[2]);
                    }
                    else {
                        $('#uc-dob-day-1').val('');
                        $('#uc-dob-month-1').val('');
                        $('#uc-dob-year-1').val('');
                    }
                }
                else {
                    $('#uc-dob-day-1').val('');
                    $('#uc-dob-month-1').val('');
                    $('#uc-dob-year-1').val('');
                }
            }
        });

        $('body').on('click', '#fill-form-with-test-data', function(event) {
            event.preventDefault();

            prefillRcFormWithTestData();
        });

        var now = new Date();

        $('#uc-arrival-date-day').val(now.getDate());
        $('#uc-arrival-date-month').val(now.getMonth() + 1);

        $form.on('submit', function(event) {
            event.preventDefault();

            if (isFormValid()) {
                var data = formData();

                var people = [];

                $.each(data.people, function(i, person) {
                    people.push({
                        "vPhoneNumber": data['phone'],
                        "vEmail": data['email'],
                        "vQuarantineAddressCity": data['isolation-municipality'],
                        "vQuarantineAddressCityZipCode": data['isolation-zip'],
                        "vQuarantineAddressStreetName": data['isolation-street'],
                        "vQuarantineAddressStreetNumber": data['isolation-house-number'],
                        "dEntry_from_abroad_planned_at": data['arrival-year'] + '-' + rcLpad(data['arrival-month'], '00') + '-' + rcLpad(data['arrival-day'], '00'),
                        "vHas_come_from_country": data['country-arrival'],
                        "vOther_countries_visited": $.map(data['otherCountries'], function(country) {
                            return country.name;
                        }),
                        "nHouseHoldPersonsCount": data['household-members-count'],
                        "vGp_name": data['gp'],

                        "vPersonal_id": person['id-type'] === 'foreign' ? person['id'] : null,
                        "vSurname": person['last-name'],
                        "vGivenNames": person['first-name'],
                        "dDateOfBirth": person['dob-year'] + '-' + rcLpad(person['dob-month'], '00') + '-' + rcLpad(person['dob-day'], '00'),
                        "vPersonalNumber": person['id-type'] === 'slovak' ? person['id'] : null,
                        "nHealtInsuranceCompany": person['insurance'],

                        "vSex":"X",
                        "vQuarantineAddressCountry": 'SK',
                    });
                });

                $('main .govuk-width-container > *:not(#rc-form-holder)').hide();
                $form.hide();
                $('#uc-loading').show();

                grecaptcha.ready(function() {
                    grecaptcha.execute('6LcbNrIZAAAAAPI2oYNKKZAlPj7wBIb3rl_ZP7z2', {action: 'submit'}).then(function(token) {
                        $.ajax({
                            type: 'POST',
                            url: 'https://ekarantena.korona.gov.sk/ehranica/',
                            data: JSON.stringify({
                                isTest: isInTestMode,
                                token: token,
                                people: people
                            }),
                            error: function() {
                                $('#uc-loading').hide();
                                $('#uc-error').show();
                            },
                            success: function(response) {
                                if (!response.payload || !response.payload.vCovid19Pass) {
                                    $('#uc-loading').hide();

                                    if (response.errors &&
                                        response.errors.length > 0 &&
                                        response.errors[0].description) {

                                        if (response.errors[0].description.indexOf('odné číslo') > -1) {
                                            $('#uc-slovak-id-registered').show();
                                        } else if (response.errors[0].description.indexOf('ahraničný identifikátor') > -1) {
                                            $('#uc-foreign-id-registered').show();
                                        }
                                    }
                                    $('#uc-error').show();
                                }
                                else {
                                    $('#uc-loading').hide();
                                    $('#uc-thank-you').show();
                                }
                            },
                            contentType: "application/json",
                            dataType: 'json'
                        });
                    });
                });
            }

            var $firstVisibleErrorMessage = $('.govuk-error-message:visible:first');
            $window.scrollTop($firstVisibleErrorMessage.length === 0 ? 0 : $firstVisibleErrorMessage.offset().top - 50);
        })

        $form.show();

        rcCountryAutocompleteInit('uc-country');
        rcAutocompleteInit('uc-isolation-municipality');
        rcAutocompleteInit('uc-permanent-municipality');

        if (isInTestMode) {
            $form.prepend('<div style="margin-bottom: 100px;">\n' +
                '                <a href="#" id="fill-form-with-test-data">Vyplniť testovacie údaje</a>\n' +
                '            </div>');
        }
    })
})(jQuery);