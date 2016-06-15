<?php
namespace App\Http\Traits;

use File;

trait PagesTemplates {

    public function getCurrentPageTemplate($active = '', $blockid = 0, $pageid = 0) {

        return $this->processTemplateFile(
            resource_path('views').'/templates/'. $active .'.blade.php', 
            $active, 
            '', 
            true,
            $blockid,
            $pageid
        ); 

    }


    public function getPagesTemplates($active = '') {

        $files = File::files(resource_path('views').'\templates');
        $templates = array();

        foreach ($files as $template) {
            $file = explode("/", $template);
            $file = end($file);
            $file = explode(".", $file);

            $title = $file[0];

            $templates[] = $this->processTemplateFile($template, $title, $active); 
        }

        return $templates;

    }

    private function processTemplateFile($path, $title, $active, $edit = false, $blockid = 0, $pageid = 0){
        
        $this->templateBlockArray = array();
        $templateHTML       = file_get_contents($path);

        //Controleer of er uberhaupt blokken in het html bestand zitten
        
        if (strpos($templateHTML, "{cf_block_")){
        
            $templateBlockCount = substr_count($templateHTML, "{cf_block_"); 
            
            $count  = 0;
            
            while ($count < $templateBlockCount){                       
                
                $id = $count + 1;
            
                $out = $this->findinside($id, "{cf_block_" . $id . "}", "{/cf_block_" . $id . "}", $templateHTML);
                
                $count++;
                
            }


            $html = "<div class='holder " . ($title == $active ? "active" : "") . "'>";

                $html .= "<div id='" . $title . "' class='template' title='" . ucfirst($title) . "'>";
                
                    foreach ($this->templateBlockArray as $id=>$style){

                        $style = explode(",", $style);
                        $html .= "<div id='block_" . $id . "' class='". ($blockid == $id ? "active" : "") ."' style='width: " . $style[0] . "%; height: " . $style[1] . "%'>";
                            
                            if($edit) {
                                $html .= "<a href='". url('cfadmin/Pages/Edit/'. $pageid .'/Content/'. $id) ."'><i class='fa fa-edit fa-fw'></i></a>";
                            } else {
                                $html .= "&nbsp;";
                            }

                        $html .= "</div>"; 
                        
                    }

                    
                $html .= "</div>";  

                if(!$edit) {
                    $html .= "<h3>" . ucfirst($title) . "</h3>";
                }

            $html .= "</div>";            
                

            return $html;
        
        }
    
    }

    private function findinside($id, $start, $end, $string) {
        preg_match_all('/' . preg_quote($start, '/') . '([^\.)]+)'. preg_quote($end, '/').'/i', $string, $m);
        return $this->templateBlockArray[$id]  = $m[1][0];
    }

}