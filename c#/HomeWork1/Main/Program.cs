using HomeWork1;

class Program {
    private static void Main(string[] args)
    {
        //1
        // declare a Car object reference named myCar
        Car myCar;
        // create a Car object, and assign its address to myCar
        System.Console.WriteLine("Creating a Car object and assigning " + "its memory location to myCar");
        myCar = new Car();

        // assign values to the Car object's fields using myCar
        myCar.Make = "Toyota";
        myCar.Model = "MR2";
        myCar.Color = "black";
        myCar.YearBuilt = 1995;

        // display the field values using myCar
        System.Console.WriteLine("myCar details:");
        System.Console.WriteLine("myCar.make = " + myCar.Make);
        System.Console.WriteLine("myCar.model= " + myCar.Model);
        System.Console.WriteLine("myCar.color = " + myCar.Color);
        System.Console.WriteLine("myCar.yearBuilt= " + myCar.YearBuilt);

        // call the methods using myCar
        myCar.Start();
        myCar.Stop();


        //2
        Window win = new Window(1, 2);
        ListBox listBox = new ListBox(3, 4, "aka");

        win.DrawWindow();
        listBox.DrawWindow();

        Window[] winArray = new Window[2];
        winArray[0] = new Window(1, 2);
        winArray[1] = new ListBox(1, 2, "ako");

        for (int i = 0; i < 2; i++)
        {
            winArray[i].DrawWindow();
        }
    }
}
