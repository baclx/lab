using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab06
{
    internal class Cooler
    {
        public Cooler (float temperature)
        {
            Tempperature = temperature;
        }
        public float Tempperature
        {
            get { return _Temperature; }
            set { _Temperature = value; }
        }
        public float _Temperature;
        public void OnTemperatureChanged(float newTemperature)
        {
            if (newTemperature > Tempperature)
            {
                System.Console.WriteLine("Cooler: On");
            }else
            {
                System.Console.WriteLine("Cooler: Off");
            }
        }
    }
}
