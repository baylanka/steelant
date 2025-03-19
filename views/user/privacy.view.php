<?php
use helpers\translate\Translate;
?>
<?php require_once "layout/start.layout.php" ?>

<!--body section-->
<div class="jumbotron w-100 p-0 m-0">


    <div class="responsive-wrap alignment-full-padding">
        <!--categories section-->
        <div class="row w-100 mt-4">


            <div class="col-12 col-md-4 col-xxl-4 row gap-3">
                <div class="col-md-3">
                    <img src="<?= assets("themes/user/img/copyright-icon.png") ?>" height="80" alt="steelwall_privacy_icon"/>
                </div>
                <div class="col-md-8">
                    <dl>
                        <h4 class="selected"><?=Translate::get('privacy','privacy_policy')?></h4>
                    </dl>

                </div>

            </div>


        </div>
        <!--categories section-->


        <?php require_once "layout/sub_nav.layout.php" ?>


        <hr/>

        <h4 class="connector-heading my-3"><?=Translate::get('privacy','legal_advices')?></h4>

        <hr/>

        <div class="row justify-content-start mt-5">
            <div class="col-12 col-md-12">
                <div style="text-align: justify;">
                    <p style="font-weight: bold;" class="mb-2"><?=Translate::get('privacy','contact_details')?>:</p>
                    <p  class="mb-3"><?=Translate::get('privacy','controller')?>: <?=Translate::get('privacy','controller_detail')?></p>

                    <p style="font-weight: bold;" class="mb-3">Erhebung, Speicherung und Verwendung sowie Verarbeitungszwecke und -arten für personenbezogene Daten</p>

                    <p style="font-weight: bold;" class="mb-3">Beim Besuch der Firmenhomepage</p>

                    <p  class="mb-3">
                        Wenn Sie uns auf unserer Homepage www.steelwall.eu besuchen, werden durch den auf Ihrem
                        Endgerät (z.B. PC, Laptop, Smartphone, etc.) zum Einsatz kommenden Internetbrowser automatisch
                        Informationen an den Server unserer Homepage gesendet, welche zeitlich begrenzt als
                        Logfile-Dateien gespeichert und dann automatisch nach 24 Monaten gelöscht werden.
                        Diese Daten sind:</p>

                    - IP-Adresse des anfragenden Rechners<br/>
                    - Datum und Uhrzeit des Webseitenzugriffs<br/>
                    - Name und Internetlink der abgerufenen Datei<br/>
                    - Webseite, von der aus der Zugriff erfolgte<br/>
                    - verwendeter Internetbrowser<br/>
                    - das verwendete Betriebssystem Ihres Rechners und<br/>
                    - Name des Internetanbieters (auch Provider genannt)<br/><br/>


                    <p style="font-weight: bold;" class="mb-2">
                        <?=Translate::get('privacy','purposes')?>:
                    </p>
                    <p  class="mb-3">
                        <?=Translate::get('privacy','purpose_detail')?>
                    </p>

                    <p style="font-weight: bold;" class="mb-2">
                        <?=Translate::get('privacy','legal_basis')?>:
                    </p>

                    <p  class="mb-3">
                        Art. 6 Abs. 1 Satz 1 f DSGVO als berechtigtes Interesse des Verantwortlichen, welches sich aus den
                        Erhebungszwecken ableitet.
                    </p>


                    <p style="font-weight: bold;" class="mb-2">
                        Bei der Nutzung der Kontaktemailadresse, Bestell-und Anfrageformulars
                    </p>

                    <p style="font-weight: bold;" class="mb-2">
                        Bestellabwicklung im Onlineportal bzw. Musterbestellung:
                    </p>

                    <p class="mb-2">
                        Wir verarbeiten die Daten unserer Kunden im Rahmen der Bestellvorgänge in unserem Onlineportal bzw.
                        Musterbestellung, um Ihnen die Auswahl und die Bestellung der gewählten Produkte und Leistungen,
                        sowie deren Bezahlung und Lieferung, bzw. Ausführung zu ermöglichen.
                        Zu den verarbeiteten Daten gehören Bestandsdaten, Kommunikationsdaten, Vertragsdaten, Zahlungsdaten
                        und zu den von der Verarbeitung betroffenen Personen gehören unsere Kunden, Interessenten und
                        sonstige Geschäftspartner. Weiterhin speichern wir Ihre Auswahl an favorisierten Produkten.
                        Die Verarbeitung erfolgt zum Zweck der Erbringung von Vertragsleistungen im Rahmen des Betriebs
                        eines Onlineportals bzw. der Musterbestellung, Abrechnung, Auslieferung und der Kundenservices.
                        Hierbei setzen wir Session Cookies für die Speicherung des Warenkorbinhalts.
                        Bei der Erteilung Ihrer Einwilligung für die Speicherung Ihrer Daten in der Bestellung speichern wir
                        Ihre Kontaktdaten und den Inhalt der Bestellung verschlüsselt.
                        Die Verarbeitung erfolgt auf Grundlage des Art. 6 Abs. 1 lit. b (Durchführung Bestellvorgänge) und c
                        (Gesetzlich erforderliche Archivierung) DSGVO. Die Daten offenbaren wir gegenüber Dritten nur im
                        Rahmen der Auslieferung, Zahlung, Abrechnung mit Kassen oder im Rahmen der gesetzlichen Erlaubnisse
                        und Pflichten gegenüber Rechtsberatern und Behörden. Die Daten werden in Drittländern nur dann
                        verarbeitet, wenn dies zur Vertragserfüllung erforderlich ist (z.B. auf Kundenwunsch bei
                        Auslieferung oder Zahlung).
                        Die Löschung erfolgt nach Ablauf gesetzlicher Gewährleistungs-und vergleichbarer Pflichten, die
                        Erforderlichkeit der Aufbewahrung der Daten wird alle drei Jahre überprüft; im Fall der gesetzlichen
                        Archivierungspflichten erfolgt die Löschung nach deren Ablauf (Ende handelsrechtlicher (6 Jahre) und
                        steuerrechtlicher (10 Jahre) Aufbewahrungspflicht).
                    </p>

                    <p style="font-weight: bold;" class="mb-2 mt-3">
                        Musterbestellung per Kontaktformular:
                    </p>

                    <p>
                        Darüber hinaus können Sie über Kontaktformulare auf unserer Webseite mit uns in Verbindung treten,
                        um Beratung, Angebote und Informationen über Produkte und Dienstleistungen (z.B. Muster) anzufordern
                        bzw. bestellen. Die Verarbeitung erfolgt auf Grundlage des Art. 6 Abs. 1 lit. b (Durchführung
                        Bestellvorgänge) und c (Gesetzlich erforderliche Archivierung) DSGVO. Dabei sind die folgenden
                        Angaben als Pflichtangaben erforderlich:
                    </p>
                    <p>
                        - Vor- und Nachname, E-Mail-Adresse bzw. Anschrift (Straße, PLZ, Ort)<br/>
                        - Weitere relevante Angaben zu den gewünschten Produkten und Dienstleistungen bzw. Beratung
                    </p>
                    <p  class="mb-3">
                        Mit Ihrer zusätzlichen Einwilligung sammeln wir die von Ihnen über Kontaktformulare mitgeteilten
                        Informationen weiterhin zum Zwecke der Information über weitere aktuelle Produkte und
                        Dienstleistungen. Die Datenverarbeitung ist daher nach Art. 6 Abs. 1 S. 1 lit. a DSGVO
                        gerechtfertigt.
                    </p>

                    <p style="font-weight: bold;" class="mb-2">
                        <?=Translate::get('privacy','newsletter')?>:
                    </p>

                    <p>
                        Sie haben die Möglichkeit, über unsere Website unseren Newsletter zu abonnieren. Hierfür benötigen wir Ihre E-Mail-Adresse und ihre Erklärung, dass Sie mit dem Bezug des Newsletters einverstanden sind.
                        Das Abo des Newsletters kann jederzeit storniert werden. Senden Sie Ihre Stornierung bitte an folgende E-Mail-Adresse: info@steelwall.eu. Wir löschen anschließend umgehend Ihre Daten im Zusammenhang mit dem Newsletter-Versand.
                    </p>

                    <p style="font-weight: bold;" class="mb-2">
                        <?=Translate::get('privacy','cookies')?>:
                    </p>

                    <p>
                        Cookies sind kleinste Textdateien, welche notwendig sind, um ein reibungsfreies Aufrufen von Internetseiten zu ermöglichen. Dabei werden diese Cookies vom der aufgerufenen Internetseite, also z.B. auch unserer Homepage generiert und das aufrufende Endgerät, z.B. Ihr PC, Laptop oder Smartphone etc. gesendet. Inhalte sind z.B. in welcher Schriftart und -größe Ihr Internetprogramm unsere Webseite anzeigen sollte. Es handelt sich somit um keine Computerviren oder andere Schadsoftware! Auch einen unmittelbaren Rückschluss auf Personen oder eine Identität ist nicht möglich!
                    </p>

                    <p>
                        Des Weiteren setzen wir Cookies ein, um unsere Webseite noch kundenfreundlicher zu gestalten und uns selbst kritisch zu hinterfragen. Dazu können Cookies einen Besucher, welcher unsere Onlinepräsenz schon einmal aufgerufen hat, hinsichtlich dessen Webbrowser identifizieren. Nach einer vorgegeben Zeit werden diese Cookies jedoch wieder gelöscht.
                    </p>

                    <p>
                        Eine andere Art von Cookies, sog. Session-Cookies, kommen während eines Webseitenbesuchs innerhalb einer "Internet-Sitzung" zum Einsatz, welche speichern, welche Seite unserer Webseite bereits besucht wurden. Auch dies dient der Nutzerfreundlichkeit unserer Webseiten-Besucher. Diese Cookie-Art wird sofort beim Verlassen unserer Webseite gelöscht.
                    </p>

                    <p>
                        Um Einstellungen und Eingaben auf unserer Webseite nicht bei einem erneuten Besuch wiederholt eingeben zu müssen, arbeiten sog. temporäre Cookies. Aus diesen benutzerfreundlichen Gründen müssen sie für einen bestimmten Zeitraum auf dem Endgerät unseres Webseitenbesuchers gespeichert werden.
                    </p>

                    <p>
                        Als Webseiten-Betreiber hat unsere Organisation sowie externe Dritte nach Art. 6 Abs. 1f DSGVO in der Wahrung des berechtigten Interesses einen plausiblen Erhebungsgrund am Einsatz von Cookies. Es können aber vom Webseitenbesucher Einstellungen im Internetbrowser getroffen werden, entweder gar keine Cookies zu speichern oder aber vor jedem Cookie eine individuelle Erlaubnis einzuholen. Ein generelles Ablehnen von Cookies kann die Anzeige unserer Webseite beeinträchtigen.
                        Cookie Consent by Silktide
                    </p>

                    <p>
                        Auf unserer Website setzen wir die Anwendung "Cookie Consent" der Firma Silktide (Silktide Ltd, Brunel Parkway, Pride park, Derby, DE24 8HR (UK)) ein. Hierbei handelt es sich um Plugin, mit dem die Einwilligung zum Einsatz von Cookies und/oder Tracking-Technologien eingeholt werden kann. "Cookie Consent" erhebt dabei selbst keine personenbezogenen Daten. Einzelheiten zu diesem Tool finden Sie unter https://silktide.com/, Datenschutzerklärung: https://silktide.com/privacy-policy/
                    </p>

                    <h5 style="font-weight: bold;">Werkzeuge zur Homepageanalyse</h5>

                    <p style="font-weight: bold;" class="mb-2">Google Analytics</p>

                    <p>
                        Um unsere Webseite zum Zweck der fortlaufenden Optimierung besser gestalten und das Online-Marketing verbessern zu können, setzen wir Google Analytics ein. Dieser ist ein Analysedienst der bekannten Internetsuchmaschinen-Firma Google Inc. mit Sitz in 1600 Amphitheatre Parkway Mountain View, CA 94043 USA. Um unsere Webseite zu analysieren, erstellt Google Analytics pseudonymisierte Nutzungsprofile und Cookies, welche folgende Informationen über die Webseitenbenutzung speichern: Browsertyp und –version, verwendetes Betriebssystem, Internetadresse der zuvor besuchten Internetseite, IP-Adresse des zugreifenden Endgeräts sowie die Uhrzeit der Serveranfrage. Keinesfalls werden die Daten jedoch mit Ihrer IP-Adresse zusammengeführt und die IP-Adresse zusätzlich anonymisiert. So ist eine Zuordnung der Daten zur IP-Adresse nicht möglich, auch genannt IP-Masken. Details hierzu finden Sie unter: https://support.google.com/analytics/answer/2763052
                    </p>

                    <p>
                        Die Daten werden anonymisiert in die USA übertragen, gespeichert und zu oben genannten Zwecken ausgewertet. Sofern gesetzliche Bestimmungen herrschen und weitere Auftragsverarbeiter involviert sind, werden die Daten dann auch an Dritte weitergegeben.
                    </p>

                    <p>
                        Die Erfassung Ihrer personenbezogenen Daten durch Google-Analytics kann verhindert werden, indem Sie ein sog. OPT-OUT-Cookie setzen, welcher die Datenerfassung bei zukünftigen Besuchen auf unserer Webseite verhindert. Den dafür notwendigen Zusatz für Ihren Internetbrowser können Sie hier finden und herunterladen: https://tools.google.com/dlpage/gaoptout?hl=de
                    </p>

                    <p>
                        Wichtig ist dabei folgendes zu wissen: Ein OPT-OUT-COOKIE gilt nur für einen Browser, eine bestimmte Webseite und das bestimmte Endgerät, auf welchem die Installation durchgeführt wurde! Verwenden Sie andere Endgeräte, einen anderen Internetbrowser oder löschen Sie alle Cookies, dann muss das OPT-OUT-Cookie neu gesetzt werden! Werden jedoch generell keine Cookie-Installationen durch Sie zugelassen, kann eine vollständige Nutzung unserer Webseite nicht garantiert werden. Daten, die vor dem Inkrafttreten der DSGVO erhoben worden sind, wurden gelöscht.
                    </p>


                    <h5 style="font-weight: bold;">Verknüpfungen zu Social-Media-Diensten</h5>
                    <p class="mb-2">Auf unserer Webseite werden keine Verknüpfungen zu Social-Media-Diensten wie Instagramm, Twitter oder Facebook verwendet!</p>

                    <h5 style="font-weight: bold;">Verwendung von Scriptbibliotheken (Google Webfonts)</h5>
                    <p>Um unsere Inhalte browserübergreifend korrekt und grafisch ansprechend darzustellen, verwenden wir auf dieser Website Scriptbibliotheken und Schriftbibliotheken wie z. B. Google Webfonts (https://www.google.com/webfonts/). Google Webfonts werden zur Vermeidung mehrfachen Ladens in den Cache Ihres Browsers übertragen. Falls der Browser die Google Webfonts nicht unterstützt oder den Zugriff unterbindet, werden Inhalte in einer Standardschrift angezeigt.</p>
                    <p>Der Aufruf von Scriptbibliotheken oder Schriftbibliotheken löst automatisch eine Verbindung zum Betreiber der Bibliothek aus. Dabei ist es theoretisch möglich – aktuell allerdings auch unklar ob und ggf. zu welchen Zwecken – dass Betreiber entsprechender Bibliotheken Daten erheben.</p>
                    <p class="mb-3">Die Datenschutzrichtlinie des Bibliothekbetreibers Google finden Sie hier: https://www.google.com/policies/privacy/</p>

                    <h5 style="font-weight: bold;">Google Adwords</h5>
                    <p>
                        Unsere Webseite nutzt das Google Conversion-Tracking. Sind Sie über eine von Google geschaltete Anzeige auf unsere Webseite gelangt, wird von Google Adwords ein Cookie auf Ihrem Rechner gesetzt. Das Cookie für Conversion-Tracking wird gesetzt, wenn ein Nutzer auf eine von Google geschaltete Anzeige klickt. Diese Cookies verlieren nach 30 Tagen ihre Gültigkeit und dienen nicht der persönlichen Identifizierung. Besucht der Nutzer bestimmte Seiten unserer Website und das Cookie ist noch nicht abgelaufen, können wir und Google erkennen, dass der Nutzer auf die Anzeige geklickt hat und zu dieser Seite weitergeleitet wurde. Jeder Google AdWords-Kunde erhält ein anderes Cookie. Cookies können somit nicht über die Websites von AdWords-Kunden nachverfolgt werden. Die mithilfe des Conversion-Cookies eingeholten Informationen dienen dazu, Conversion-Statistiken für AdWords-Kunden zu erstellen, die sich für Conversion-Tracking entschieden haben. Die Kunden erfahren die Gesamtanzahl der Nutzer, die auf ihre Anzeige geklickt haben und zu einer mit einem Conversion-Tracking-Tag versehenen Seite weitergeleitet wurden. Sie erhalten jedoch keine Informationen, mit denen sich Nutzer persönlich identifizieren lassen.
                    </p>
                    <p>
                        Möchten Sie nicht am Tracking teilnehmen, können Sie das hierfür erforderliche Setzen eines Cookies ablehnen – etwa per Browser-Einstellung, die das automatische Setzen von Cookies generell deaktiviert oder Ihren Browser so einstellen, dass Cookies von der Domain „googleleadservices.com“ blockiert werden.
                    </p>
                    <p class="mb-3">
                        Bitte beachten Sie, dass Sie die Opt-out-Cookies nicht löschen dürfen, solange Sie keine Aufzeichnung von Messdaten wünschen. Haben Sie alle Ihre Cookies im Browser gelöscht, müssen Sie das jeweilige Opt-out Cookie erneut setzen.
                    </p>

                    <h5 style="font-weight: bold;">Betroffenenrechte</h5>
                    <p class="mb-3">Im Folgenden zeigen wir Ihnen alle Rechte auf, welche Sie in Bezug auf den Schutz Ihrer personenbezogenen Daten haben:</p>

                    <h5 style="font-weight: bold;">Recht auf Auskunft nach Art. 15 DSGVO</h5>
                    <p class="mb-3">
                        Sie haben das Recht Auskunft über die Verarbeitungszwecke, die Kategorien personenbezogener Daten, die Empfänger oder Kategorien von Empfängern, gegenüber denen die personenbezogenen Daten offengelegt werden oder wurden, die geplante Dauer, für die die personenbezogenen Daten gespeichert werden oder wurden bzw. die Festlegung für diese Dauer, die Rechte auf Berichtigung und Löschung der sie betreffenden personenbezogenen Daten oder auf Einschränkung bzw. Widerspruchs der Bearbeitung, das Bestehen eines Beschwerderechts bei der Aufsichtsbehörde, die Auskunftseinholung über die Datenherkunft, wenn Daten nicht bei Ihnen erhoben wurden und das Bestehen einer automatisierten Entscheidungsfindung einschließlich Profiling sowie der darin involvierten Logik und Tragweite einzuholen.
                    </p>

                    <h5 style="font-weight: bold;">Recht auf Datenberichtigung nach Art. 16 DSGVO</h5>
                    <p class="mb-3">
                        Sie haben das Recht, sie betreffende unrichtige Daten unverzüglich berichtigen zu lassen. Unter Berücksichtigung der Verarbeitungszwecke können Sie auch eine Vervollständigung unvollständiger personenbezogene Daten, auch mittels zusätzlicher Erklärung, verlangen.
                    </p>

                    <h5 style="font-weight: bold;">Recht auf Löschung nach Art. 17 DSGVO</h5>
                    <p class="mb-3">
                        Sie haben das Recht auf unverzügliche Löschung Ihrer personenbezogenen Daten bei uns, sofern der Löschung nicht das Recht auf freie Meinungsäußerung und Information, die Erfüllung einer rechtlichen Verpflichtung, die Wahrung des öffentlichen Interesses oder die Geltendmachung, Ausübung und Verteidigung von Rechtsansprüchen entgegensteht.
                    </p>

                    <h5 style="font-weight: bold;">Recht auf Einschränkung der Verarbeitung nach Art. 18 DSGVO</h5>
                    <p class="mb-3">
                        Sie haben das Recht auf Einschränkung der Verarbeitung, wenn die Richtigkeit der personenbezogenen Daten bestritten wird, die Verarbeitung unrechtmäßig ist und die Löschung von Ihnen abgelehnt wird und stattdessen die Nutzungseinschränkung verlangt wird, die Daten für den Verarbeitungszweck nicht länger benötigt werden, sie die Daten jedoch zur Geltendmachung, Ausübung oder Verteidigung von Rechtsansprüchen benötigen oder Sie von Ihren Recht auf Widerspruch Gebrauch gemacht haben. Ferner müssen Sie von uns unterrichtet werden, bevor die Einschränkung aufgehoben wird.
                    </p>

                    <h5 style="font-weight: bold;">Recht auf Mitteilungspflicht nach Art. 19 DSGVO</h5>
                    <p class="mb-3">
                        Sie haben das Recht, auf Mitteilung Ihrer Berichtigungs-, Löschungs- und Verarbeitungseinschränkung. Falls das mit unverhältnismäßig großem Aufwand verbunden ist, werden wir Sie davon unterrichten und gegebenenfalls davon Abstand nehmen bzw. Ihnen gegen eine Aufwandsgebühr die Leistung in Rechnung stellen.
                    </p>

                    <h5 style="font-weight: bold;">
                        Recht auf Datenübertragbarkeit nach Art. 20 DSGVO
                    </h5>
                    <p class="mb-3">
                        Sie haben das Recht, die sie betreffenden personenbezogenen Daten in einem maschinenlesbaren, strukturierten und gängigen Format zu erhalten und/oder diese, falls gewünscht, ohne Behinderung an einen anderen Verantwortlichen übermitteln zu lassen.
                    </p>

                    <h5 style="font-weight: bold;">
                        Widerspruchsrecht nach Art. 21 DSGVO
                    </h5>
                    <p class="mb-3">
                        Sie haben das Recht, aus Gründen, die sich aus der Situation ergeben, jederzeit Widerspruch gegen die Verarbeitung Ihrer personenbezogenen Daten einzulegen, wenn diese zur Wahrung laut DSGVO Art. 6 Abs. 1a-f widersprechen.
                        Wenn Sie von Ihrem Widerspruchsrecht Gebrauch machen möchte, senden Sie bitte hierzu eine E-Mail an info@steelwall.eu.
                    </p>

                    <h5 style="font-weight: bold;">
                        Recht gegen rein automatisierte Entscheidungen im Einzelfall einschließlich Profiling nach Art. 22 DSGVO
                    </h5>
                    <p class="mb-3">
                        Sie haben das Recht, nicht einer auf ausschließlich automatisierten Verarbeitung einschließlich Profiling beruhenden Entscheidung unterworfen zu werden, es sei denn, dies ist zur Erfüllung bzw. den Abschluss eines Vertrages notwendig oder wir sind einer Rechtsvorschrift der Union oder eines Mitgliedsstaates unterworfen oder Sie haben hierzu ausdrücklich eingewilligt.
                        Derzeit wenden wir keine rein automatisierte Entscheidungen im Einzelfall einschließlich Profiling an.
                    </p>

                    <h5 style="font-weight: bold;">
                        Beschränkungen nach DSGVO Art. 23
                    </h5>
                    <p class="mb-3">
                        Nach DSGVO Art. 23 befugt die Union und die Mitgliedstaaten, die Löschung gesetzlich zu beschränken, sofern eine solche Beschränkung den Wesensgehalt der Grundrechte und Grundfreiheiten achtet, eine notwendige und verhältnismäßige Maßnahme darstellt und (zumindest) einem der in Art. 23 genannten Zwecke dient.
                    </p>

                    <h5 style="font-weight: bold;">
                        Beschwerderecht bei der Datenschutzbehörde
                    </h5>
                    <p class="mb-3">
                        Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder Ihre datenschutzrechtlichen Ansprüche sonst in einer Weise verletzt worden sind, können Sie sich bei der Aufsichtsbehörde beschweren. In Österreich ist dies die Datenschutzbehörde.
                    </p>

                    <h5 style="font-weight: bold;">
                        Datenweitergabe
                    </h5>
                    <p  class="mb-1">
                        Generell geben wir keine Daten von irgendjemand ohne Berechtigung, Einwilligung oder gesetzlichen Gründen weiter. In folgenden Fällen geschieht eine Datenweitergabe jedoch wenn:
                    </p>

                    <p class="mb-3">
                        - Sie uns Ihre ausdrückliche Einwilligung aus einem oder mehreren Zwecken gegeben haben (Art 6 Abs. 1a DSGVO),<br/>
                        - dies zur Erfüllung von Verträgen oder vorvertraglichen Maßnahmen, z.B. im Rahmen von Anfragen, erforderlich ist (Art 6 Abs. 1b DSGVO),<br/>
                        - eine gesetzliche Verpflichtung dazu besteht (Art 6 Abs. 1c DSGVO),<br/>
                        - lebenswichtige Interessen, z.B. bei erste-Hilfe-Maßnahmen, oder die einer anderen Person geschützt werden sollten (Art 6 Abs. 1d DSGVO) oder<br/>
                        - dies zur Wahrung von berechtigten Interessen des Betreibers oder von Dritten dient und dies dabei gleichzeitig nicht Ihre Interessen, Grundrechte und Grundfreiheiten, die den Schutz Ihrer Daten betrifft überwiegt, insbesondere wenn es sich um ein Kind handelt (Art 6 Abs. 1f DSGVO)
                    </p>

                    <h5 style="font-weight: bold;">
                        Datensicherheit der Homepage
                    </h5>

                    <p>
                        Zur Kommunikation mit unserer Webseite verwenden wir bei den Seitenaufrufen sichere Übertragungsprotokolle, was mit dem Anfang unserer Internetadresse https, was für "Hypertext Transfer Protocol Secure" (= Sicheres Hypertext-Übertragungsprotokoll steht, zu erkennen ist.
                    </p>
                    <p class="mb-3">
                        Wir bedienen uns weiterer technischer und organisatorischer Maßnahmen, um die Sicherheit unserer Webseite fortlaufend zu verbessern, was jedoch auch vom technischen Fortschritt abhängig ist.
                    </p>

                    <h5 style="font-weight: bold;">
                        Aktualitätsstand
                    </h5>
                    <p class="mb-3">
                        Sowohl der Stand der Technik als auch gesetzliche Bestimmungen entwickeln sich fortlaufend weiter. Aus diesem Grund kann es künftig zu Änderungen der hier vorliegenden Datenschutzerklärung kommen. Diese hier abgefasste Datenschutzerklärung ist mit Stand per Mai 2018 gültig.
                    </p>
                </div>
            </div>
        </div>
    </div>


</div>

<!--body section-->

<?php require_once "layout/end.layout.php" ?>
