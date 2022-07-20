using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab06
{
    internal class Program
    {
        public delegate void Incremnent (ref int X);
        public static void Add2 (ref int x)
        {
            x += 2;
        }
        public static void Add3 (ref int x)
        {
            x += 3;
        }
        public static void Main()
        {
            //Incremnent functionDelegate = Add2;
            //functionDelegate += Add3;
            //functionDelegate += Add2;
            //int x = 5;
            //functionDelegate(ref x);
            //Console.ReadLine();

            Thermostat thermostat = new Thermostat();
            Heater heater = new Heater(60);
            thermostat.OnTemperatureChange += heater.OnTemperatureChanged;

            Heater heater1 = new Heater(100);
            thermostat.OnTemperatureChange += heater1.OnTemperatureChanged;

            Cooler cooler = new Cooler(80);
            thermostat.OnTemperatureChange += cooler.OnTemperatureChanged;

            string temperature;
            Console.Write("Enter temperature: ");
            temperature = Console.ReadLine();
            thermostat.CurrentTemperature = int.Parse(temperature);
        }
    }

}
