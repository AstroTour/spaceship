<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Faq;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer')->nullable();
            $table->timestamps();
        });

        Faq::create([
            'question' => 'Hogyan működik egy űrhajó?',
            'answer' => 'Az űrhajók működése az űrutazás során használt rakétatechnológián alapul. A rakéták motorjai rendkívül nagy sebességet adnak a járműnek, hogy átlépjék a Föld légkörét. Az űrhajók hajtóművei különböző üzemanyagokat használnak, hogy mozgásban tartsák az eszközt az űrben, miközben az égitestek közötti távolságokat is áthidalják.'
        ]);

        Faq::create([
           'question' => 'Mi az űrturizmus?',
           'answer' => 'Az űrturizmus az a tevékenység, amikor civilek, tehát nem űrhajósok, elutazhatnak a világűrbe, hogy élvezhessék az űrélményt. A legnépszerűbb cégek, mint a SpaceX, Blue Origin és Virgin Galactic, már fejlesztenek olyan programokat, amelyek lehetővé teszik az emberek számára, hogy egy rövid időre az űrbe utazzanak, és megtapasztalják a súlytalanságot, valamint lenézhessenek a Földre.'
        ]);

        Faq::create([
            'question' => 'Mennyire biztonságos az űrutazás?',
            'answer' => 'Az űrutazás rendkívül biztonságos, mivel minden űrhajónk a legszigorúbb biztonsági előírásoknak megfelel, és folyamatosan karbantartott. Minden utazást magasan képzett személyzet irányít. Az utasaink biztonsága az első számú prioritás.'
        ]);

        Faq::create([
            'question' => 'Miért válasszam az alkalmazásunkat más űrutazós szolgáltatók helyett?',
            'answer' => 'Mi a legmodernebb űrhajókkal és a legbiztonságosabb utazási protokollokkal dolgozunk. A szolgáltatásunk egyszerűsíti az utazási élményt, gyors foglalást és könnyű hozzáférést biztosít a legfrissebb menetrendekhez. Emellett folyamatosan figyelünk a környezetvédelmi szempontokra is.'
        ]);

        Faq::create([
            'question' => 'Mit tartalmaz a felkészítő lecke?',
            'answer' => 'A felkészítő lecke célja, hogy felkészítsen a bolygók közötti utazásra. A lecke áttekintést ad a fontos tudnivalókról, mint például a térbeli tájékozódás, az űrhajó fedélzeti rendszerei, a biztonsági protokollok, és az alapvető kommunikációs szabályok.'
        ]);

        Faq::create([
            'question' => 'Milyen időtartamúak az utazások?',
            'answer' => 'Az utazás időtartama a választott bolygó távolságától függ. Az időtartamot a menetrendben feltüntetjük, és valós idejű frissítéseket is biztosítunk az esetleges változások esetén.'
        ]);

        Faq::create([
            'question' => 'Hogyan készülhetek fel az eltérő gravitációra a bolygókon?',
            'answer' => 'Az alkalmazás felkészítő leckéje tartalmaz információkat a különböző gravitációs viszonyokhoz való alkalmazkodásról, és a legfontosabb tudnivalókról. Emellett a fedélzeten speciális edzésprogramok is rendelkezésre állnak.'
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
