<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Spaceship;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('spaceships', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('information');
            $table->unsignedSmallInteger('capacity');
            $table->timestamps();
        });

        Spaceship::create([
            'name' => 'Odyssey',
            'information' => 'Az Odyssey egy hosszú távú űrutazásokra tervezett hajó, amely egyszerre szolgál kutatásra és emberi kolonizációra. Az űrhajó külseje futurisztikus, és az aerodinamikai tervezés figyelembe veszi a bolygók közötti gyors mozgást. A hajó testét különleges titánium-kerámia ötvözet borítja, amely képes ellenállni a meteoritokkal való ütközésnek. Az Odyssey belső terét úgy alakították ki, hogy a legénység számára ne csak technikai, hanem pszichológiai szempontból is kényelmes legyen. A színek világosak és nyugodtak, a szellőzés és a mesterséges fények folyamatosan fenntartják az ideális hangulatot. Az automatikus rendszer a fedélzeten minden lépést felügyel, az emberi beavatkozás minimálisra csökkenthető.',
            'capacity' => 10
        ]);

        Spaceship::create([
            'name' => 'Origin',
            'information' => 'Az Origin egy igazi technológiai mestermű, amely egyesíti a gyorsaságot és a hatékonyságot. A hajó kompakt, de maximálisan funkcionalista: minden egyes négyzetméterét kioptimálizálták a hosszú távú utazásokhoz. Az Origin egyik legnagyobb újítása az újrahasznosító víz- és oxigénrendszer, amely lehetővé teszi a legénység számára, hogy akár évekig is önállóan működjön a bolygók közötti térben. A kabinok minimalista stílust követnek, de minden egyes kényelmet biztosítanak a legénység számára, hogy a küldetés zökkenőmentesen haladhasson. Az Origin minden részlete a hatékonyságot és a fenntarthatóságot célozza meg.',
            'capacity' => 12
        ]);

        Spaceship::create([
            'name' => 'Nova',
            'information' => 'A Nova egy éjszakai égbolt alatt ragyogó csillaghoz hasonlítható űrhajó, amely a legújabb fénysebességű hajtóművekkel van felszerelve. Az űrhajó külseje fekete és ezüst színben pompázik, és olyan anyagokból készült, amelyek képesek elnyelni a csillagfény visszaverődését. Kisebb kapacitású, de az erőforrásait maximálisan kihasználva képes az adott küldetésekre gyorsan és hatékonyan elérni a célpontokat. Az űrhajó belseje futurisztikus, a falak áttetszőek, így a legénység tagjai szinte folyamatosan kapcsolatban állhatnak az univerzummal, miközben végzik feladataikat. Az energiaellátás megújuló forrásokra épül, ami csökkenti az üzemeltetési költségeket.',
            'capacity' => 9
        ]);

        Spaceship::create([
            'name' => 'Chronos',
            'information' => 'A Chronos a legnagyobb és legimpozánsabb űrhajó a flottában. Külsőleg masszív, szinte ősi erőt sugároz, mintha egy időutazó hajó lenne, amely a múltból jött. A hajó belsejében luxus és praktikum egyesül, a legénység számára olyan teret biztosít, mintha egy mobil kutatóközpont lenne. A fedélzeten egy hatalmas, üvegkupola található, amelyből a csillagok és bolygók látványa nyújt pihenést a hosszú utazások során. A Chronos az idő fogalmát is újraértelmezi, és rendkívül precíziós navigációs rendszerei képesek minimalizálni az időeltolódásokat a távoli bolygók közötti utazások során.',
            'capacity' => 12
        ]);

        Spaceship::create([
            'name' => 'Phantom',
            'information' => 'A Phantom egy titkos küldetésekhez kifejlesztett űrhajó, amelyet kifejezetten az észlelhetetlenségre terveztek. Külső megjelenését a legújabb rejtett technológiák és álcázó rendszerek formálják, így a hajó szinte teljesen láthatatlan a hagyományos radarok számára. A belső tér sötét, matt fémfelületek uralják, hogy a legénység ne vonja magára a figyelmet a hosszú küldetések során. A Phantom egyedülállóan képes elérni azokat a helyeket, ahová más űrhajók nem merészkednek, és a legbonyolultabb feladatokat is végrehajtja, mindeközben elkerülve a legnagyobb veszélyeket.',
            'capacity' => 10
        ]);

        Spaceship::create([
            'name' => 'Spectra',
            'information' => 'A Spectra egy elegáns, rendkívül precíziós eszközként van megalkotva. Külső dizájnja áramvonalas, sima vonalakkal, amelyek szinte úszni látszanak az űrben. A hajó színvilága csillogó ezüst és metálkék árnyalatokban játszik, tükrözve a csillagok fényét. A belső tér nyugodt és jól felszerelt, a legénység tagjai minden kényelmet élvezhetnek a folyamatos kutatás és laboratóriumi munkák közben. A Spectra a legújabb érzékelő- és kommunikációs rendszerekkel van felszerelve, amelyek a legkisebb változásokat is észlelik az univerzumban, így folyamatosan biztosítja a legpontosabb adatokat a küldetések során.',
            'capacity' => 15
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spaceships');
    }
};
