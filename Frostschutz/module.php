<?php

// Klassendefinition
class Wetterstationsautomatik extends IPSModule
{
    /**
    * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
    * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
    *
    * ABC_MeineErsteEigeneFunktion($id);
    *
    */
          
        

    // Überschreibt die interne IPS_Create($id) Funktion
    public function Create()
    {
        parent::Create();
            
        // Profile
        
            
		// Notwenige Variablen
		$this->RegisterVariableBoolean("STATUS", "Status", "FrostStatus", 0);
		$this->RegisterVariableInteger("SOLLTEMPAKTIV", "Frostschutz aktiv wen Temperatur unter:", "FrostTempSoll", 1);
		$this->RegisterVariableInteger("SEOLLTEMPQUITTIERUNG", "Frostschutz deaktivieren wen Temperatur über:", "FrostTempSoll", 2);
		$this->RegisterVariableInteger("ZEITRAUM", "Zeitraum letzer Regendetektierung:", "FrostZeitSoll", 3);
            
        // Eigenschaften speichern
		$this->RegisterPropertyInteger("Temperatursensor", 0);
		$this->RegisterPropertyInteger("Regensensor", 0);

		// Attribute
		$this->RegisterAttributeBoolean("Regenstatus", false);
		

    }

    public function RequestAction($Ident, $Value)
    {
			switch ($Ident) {
  				case "STATUS":
  					SetValue($_IPS['VARIABLE'] , $_IPS['VALUE']);
					break;
			}      
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();
        
        // RegisterMessage eintragen
        
    }
    
    public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
	{
			$Regensensor = $this->ReadPropertyInteger("Regensensor"); 

        switch ($SenderID) {
            case $Variable1:
                
            break;
			
            case $Regensensor:
              $this->RegenStatus();  
            break;
        }
	}

	public function RegenStatus() {
			$Regensensor = GetValue($this->ReadPropertyInteger("Regensensor"));

			if($Regensensor) {
					$this->WriteAttributeBoolean("Regensensor", true);	
					// Timer setzen, welcher in X Stunden den Attribute "Regensensor" wieder auf false stellt.
			}
	}

	public function RegenAttributeDeaktivieren() {
		$this->WriteAttributeBoolean("Regensensor", false);
	}

   	public function FrostCheck() {
		$AutomatikStatus = GetValue($this->GetIDForIdent("STATUS"));
		
		
	}
        
    
      
    
       
   
}
