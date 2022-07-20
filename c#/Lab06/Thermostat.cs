using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CntDB.Lab.Lab06
{
    internal class Thermostat
    {
        public delegate void TemperatureChangeHandler(
                float newTemperature
            );
        private TemperatureChangeHandler _OnTemperatureChange;
        public TemperatureChangeHandler OnTemperatureChange
        {
            get { return _OnTemperatureChange; }
            set { _OnTemperatureChange = value; }
        }
        public float CurrentTemperature
        {
            get { return _CurrentTemperature; }
            set
            {
                if (value != CurrentTemperature)
                {
                    _CurrentTemperature = value;
                    // Call subscribers
                    if (OnTemperatureChange != null)
                    {
                        OnTemperatureChange(value);
                    }

                }
            }
        }
        private float _CurrentTemperature;

    }
}
