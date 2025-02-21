<?php

use App\Models\Prospectus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prospectuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('information');
            $table->string('picture');
            $table->timestamps();
        });

        Prospectus::create([
            'title' => 'Biztonsági előírások az űrutazás során',
            'information' => 'Az űrutazás speciális biztonsági intézkedéseket igényel. Súlytalanságban másképp működik a mozgás, ezért kiképzés szükséges. Vészhelyzeti protokollok biztosítják az utasok épségét tűz, meghibásodás vagy nyomáscsökkenés esetén. Űrruhák védenek a szélsőséges körülményektől és biztosítják az oxigénellátást.',
            'picture' => 'pictures/safety.jfif',
        ]);

        Prospectus::create([
            'title' => 'Felkészítés az űrutazásra',
            'information' => 'Az utazás előtt fizikai és mentális felkészítés szükséges. Egészségügyi vizsgálatok ellenőrzik a szív- és érrendszert, valamint a súlytalanságra való érzékenységet. Parabolarepülések és szimulációk segítenek alkalmazkodni a gravitációmentes környezethez. Navigációs tréning biztosítja a fedélzeti rendszerek alapszintű ismeretét.',
            'picture' => 'pictures/preparatory.jfif',
        ]);

        Prospectus::create([
            'title' => 'Mentőkabin és vészhelyzeti eljárások',
            'information' => 'Az űrhajók mentőkabinokkal rendelkeznek vészhelyzet esetére. Ezek önállóan működnek és elegendő oxigént, élelmet, valamint kommunikációs eszközöket biztosítanak. Evakuálási protokollok irányítják az utasokat vészhelyzet esetén, a mentőkabinok pedig automatikusan visszatérhetnek a Földre.',
            'picture' => 'pictures/cabin.jfif',
        ]);

        Prospectus::create([
            'title' => 'Higiénia és egészségmegőrzés',
            'information' => 'A világűrben nincs folyóvíz, ezért nedves törlőkendők, szárazsampon és speciális higiéniai eszközök használatosak. Az űrételek fagyasztva szárítottak, és víz hozzáadásával fogyaszthatók. Orvosi felszerelések és távoli konzultációk biztosítják a sürgősségi ellátást.',
            'picture' => 'pictures/hygiene.jfif',
        ]);

        Prospectus::create([
            'title' => 'Kommunikáció és kapcsolat a Földdel',
            'information' => 'Az űrhajósok rádióhullámokon keresztül tartják a kapcsolatot az irányítóközponttal, de a nagy távolság miatt késleltetéssel. Internet és videóhívás elérhető a Nemzetközi Űrállomáson. Az űrhajósok rendszeresen kapcsolatba léphetnek családtagjaikkal a mentális egészségük megőrzése érdekében.',
            'picture' => 'pictures/communication.jfif',
        ]);

        Prospectus::create([
            'title' => 'Fenntarthatóság és űrkörnyezetvédelem',
            'information' => 'Az űrhulladék veszélyezteti a jövőbeli küldetéseket, ezért újrahasznosítási technológiák segítik a csökkentését. Az új generációs űrhajók újrafelhasználható anyagokból készülnek. Zárt rendszerű életfenntartó rendszerek biztosítják a víz és oxigén újrahasznosítását.',
            'picture' => 'pictures/sustainability.jfif',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospectuses');
    }
};
