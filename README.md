## **Version 1.0**

### **Funktion**
Unter folgenden Bedienungen wird ein Frostalarm angezeigt.
- Regensensor hat in den letzten 4 Stunden (einstelltbar) Regen detektiert.
- Temperatur ist unter 3 Grad Celsiu (einstellbar).

Unter fogenden Bedienungen wird der Frostalarm wieder quittiert.
- Temperatur über 4 Grad Celsius (einstellbar).

### **Variablen**
Folgende Variablen werden automatisch erstellt.
- Integervariable für Soll-Temperatur (auslösung), welche unterschritten sein muss.
- Integervariable für Soll-Temperatur (quittierung), welche ünerschritten sein muss.
- Integervariable für Soll-Stunden, Zeitspanne für Regen.

### **Konfigurationsformular**
Einstellungsmöglichkeiten innerhalb des Konfigurationsformular.
- Regensensor mittels "SelectVariable".
- Temperatursensor mitter "SelectVariable".