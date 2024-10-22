#include <LiquidCrystal.h>
#include <Keypad.h>
LiquidCrystal lcd(12, 11, 10, 9, 8, 7);


const byte KEYPAD_ROWS = 4;
const byte KEYPAD_COLS = 4;
byte rowPins[KEYPAD_ROWS] = {5, 4, 3, 2};
byte colPins[KEYPAD_COLS] = {A3, A2, A1, A0};
char keys[KEYPAD_ROWS][KEYPAD_COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'.', '0', '=', '#'}
};

Keypad keypad = Keypad(makeKeymap(keys), rowPins, colPins, KEYPAD_ROWS, KEYPAD_COLS);


int password_Onstate = 123;
int password_Offstate = 321;
uint64_t value = 0;
int bulb = 13;

void showSpalshScreen() {
  lcd.print("Dawilly gene");
  lcd.setCursor(3, 1);
  String message = "zombie";
  for (byte i = 0; i < message.length(); i++) {
    lcd.print(message[i]);
    delay(100);
  }
  delay(500);
}

void updateCursor() {
  if (millis() / 250 % 2 == 0 ) {
    lcd.cursor();
  } else {
   lcd.noCursor();
  }
}

void setup() {
  Serial.begin(9600);
  lcd.begin(16,2);
  showSpalshScreen();
  lcd.clear();
   lcd.print("Enter the password");
  lcd.setCursor(0,1);
}



void processInput(char key) {
  static int pass = 0;
  if(key != '=')
   {
     lcd.print(key);
   if (isdigit(key)) { 
      pass = pass * 10 + (key - '0');
    }
    else if(key == '#'){
     pass=0;
     lcd.clear();
        lcd.print("Enter the password");
        lcd.setCursor(0,1);
    }
   }
   else{
      if(pass == password_Onstate){
      lcd.clear();
       digitalWrite(bulb,HIGH);
       lcd.print("Enter the password");
       lcd.setCursor(6,1);
       lcd.print("bulb ON");
       lcd.setCursor(0,1);
      }
   }
   
 // lcd.print(key);
}

void loop() {
  updateCursor();

  char key = keypad.getKey();
  if (key) {
    processInput(key);
  }
}
