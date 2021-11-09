<?php
require_once(File::build_path(array("fpdf183", "fpdf.php")));

class PDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // Parseur HTML
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Texte
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Balise
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extraction des attributs
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Balise ouvrante
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Balise fermante
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modifie le style et sélectionne la police correspondante
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Place un hyperlien
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }


// En-tête
    function Header()
    {
        // Logo
        $this->Image('image/logo.png', 10, 6, 30);
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(50);
        // Titre
        $this->Cell(100, 20, 'Bull\'s Friends Association', 0, 0, 'C');
        // Saut de ligne
        $this->Ln(20);
    }

// Pied de page
    function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
    function titreTexte($titre){
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(50);
        // Titre
        $this->Cell(100, 20, "$titre" , 0, 0, 'C');
        // Saut de ligne
        $this->Ln(20);
    }
    function corpsTexte(){
        $txt ="";
        // Times 12
        $this->SetFont('Times','',12);
        // Sortie du texte justifié
        $this->MultiCell(0,5,$txt);
        // Saut de ligne
        $this->Ln();
    }
    function AjouterSection($titre, $corps)
    {
        $this->AddPage();
        $this->titreTexte($titre);
        $this->corpsTexte($corps);
    }

    public static function generatePDF(){
        if (isset($_POST['submit'])) {
            $civilite = $_POST['civilite'];
            $nomFamilleAccueil = $_POST['nomFamilleAccueil'];
            $prenomFamilleAccueil = $_POST['prenomFamilleAccueil'];
            $mail = $_POST['mail'];
            $numTelephone = $_POST['numTelephone'];
            $adresseFamilleAccueil = $_POST['adresseFamilleAccueil'];
            $codePostalFamilleAccueil = $_POST['codePostalFamilleAccueil'];
            $villeFamilleAccueil = $_POST['villeFamilleAccueil'];
            $paysFamilleAccueil = $_POST['paysFamilleAccueil'];

// ajouter data chien accueilli

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $error = 'Entrez une adresse email valide';
                echo $error;
            }
//si pas d'erreur continuer
            if (!isset($error)) {
                //creer le HTML des donnees en post
                $body = ''
                    . '<div>Civilité : ' . $civilite . '</div>'
                    . '<div>Nom Prénom : ' . $nomFamilleAccueil . ' ' . $prenomFamilleAccueil . '</div>'
                    . '<p>Adresse : ' . $adresseFamilleAccueil . '</p>'
                    . '<p>Code postal : ' . $codePostalFamilleAccueil . '</p>'
                    . '<p>Ville : ' . $villeFamilleAccueil . '</p>'
                    . '<p>Pays : ' . $paysFamilleAccueil . '</p>'
                    . '<p>E-mail : ' . $mail . '</p>'
                    . '<p>Tel. Fixe : ' . $numTelephone . '</p>';

                ob_end_clean();
                ob_start();
                $pdf = new PDF();
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Times', '', 12);
                $body = iconv('UTF-8', 'windows-1252', $body);
                $pdf->WriteHTML($body);
                $pdf->Output();
                ob_end_flush();
            }
        }
    }
}



?>

