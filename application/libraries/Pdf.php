<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once FCPATH .'application/third_party/tcpdf/tcpdf.php';

class Pdf extends TCPDF {
	public $Leader;
	
    function __construct() {
        parent::__construct();
        $this->Leader = "";
		$this->SetHeaderMargin(5);
		$this->SetTopMargin(50);
		$this->setFooterMargin(10);
		$this->SetAutoPageBreak(true);
		$this->SetAuthor('System Generated');
		$this->SetDisplayMode('real', 'default');
		$this->setPrintFooter(true);
		$this->setPrintHeader(true);
    }

    public function Footer() {
    	if ($this->PageNo() <= 1) return;
    	$fontsz = $this->getFontSize();
		$cur_y = $this->y;
		
		$w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
		if (!empty($this->pagegroups)) {
			$this->SetTextColorArray($this->footer_text_color);
			//set style for cell border
			$line_width = (0.85 / $this->k);
			$this->SetLineStyle(array('width' => $line_width, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => $this->footer_line_color));

			$pagenumtxt = $w_page.$this->getPageNumGroupAlias();	//.' / '.$this->getPageGroupAlias();
			$this->SetY($cur_y);
			$this->SetFontSize(8);
			//Print page number
			if ($this->getRTL()) {
				$this->SetX($this->original_rMargin);
				$this->Cell(0, 0, $pagenumtxt, 'T', 0, 'L');
			} else {
				$this->SetX($this->original_lMargin);
				$this->Cell(0, 0, $this->getAliasRightShift().$pagenumtxt, 'T', 0, 'R');
			}
			$this->SetFontSize($fontsz);
		}
	}
	
	public function Header() {
		if ($this->PageNo() <= 1) return;
		if ($this->header_xobjid < 0) {
			// start a new XObject Template
			$this->header_xobjid = $this->startTemplate($this->w, $this->tMargin);
			$this->Image( FCPATH.'images/logo-smaller.jpg', 20, 5, 15, 15, 'jpg', '', 'T', 2);
			//$this->y = $this->header_margin;
			$this->x = $this->original_lMargin;

			// header title
			$this->SetFont('helvetica', 'B', 9);
			$this->SetX(100);
			$this->SetY(10);
			$ldr = "";
			if ($this->Leader != "") $ldr = ' -- ' . $this->Leader;
			$this->Cell(0, 0, "Leadership & Management Development Assessment" . $ldr, 0, 1, 'C', 0, '', 0);
			// print an ending header line
			$this->SetLineStyle(array('width' => 1.0 / $this->k, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(45, 122, 90) ));
			$this->SetY((2.835 / $this->k) + max(50, $this->y));
			$this->SetX($this->original_lMargin);
			$this->Cell(($this->w - $this->original_lMargin - $this->original_rMargin), 15, '', 'T', 0, 'C');
			$this->endTemplate();
			$this->SetY(23);
		}
		// print header template
		$x = 0;
		$dx = 0;
		if (!$this->header_xobj_autoreset AND $this->booklet AND (($this->page % 2) == 0)) {
			// adjust margins for booklet mode
			$dx = ($this->original_lMargin - $this->original_rMargin);
		}
		if ($this->rtl) {
			$x = $this->w + $dx;
		} else {
			$x = 0 + $dx;
		}

		$this->printTemplate($this->header_xobjid, $x, 0, 0, 0, '', '', false);
		if ($this->header_xobj_autoreset) {
			// reset header xobject template at each page
			$this->header_xobjid = -1;
		}
	}
	
	
}

?>