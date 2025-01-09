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

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
