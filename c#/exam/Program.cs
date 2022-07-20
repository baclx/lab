using CntDB.OnClass;
using MySql.Data.MySqlClient;

namespace CntDB.exam
{
    class Program
    {
        public static void ReadData()
        {
            ConnectDB connectDB = new ConnectDB();
            MySqlConnection cnn = connectDB.GetConnection();

            string query = "select * from product";
            MySqlCommand sqlCommand = new MySqlCommand(query, cnn);

            cnn.Open();

            MySqlDataReader sqlDataReader = sqlCommand.ExecuteReader();

            while (sqlDataReader.Read())
            {
                Console.WriteLine("p_id: " + sqlDataReader[0]);
                Console.WriteLine("p_name: " + sqlDataReader[1]);
                Console.WriteLine("p_price: " + sqlDataReader[2]);
            }

            cnn.Close();
        }
        public static void CreateData(string Name, int Price)
        {
            ConnectDB connectDB = new ConnectDB();
            MySqlConnection cnn = connectDB.GetConnection();
            string query = "insert into product values (" + Name + ',' + Price + ")";
            MySqlCommand MysqlCommand = new MySqlCommand(query, cnn);
            cnn.Open();

            MysqlCommand.ExecuteNonQuery();

            cnn.Close();
        }
        public static void DeleteData(int id)
        {
            ConnectDB connectDB = new ConnectDB();
            MySqlConnection cnn = connectDB.GetConnection();
            string query = "delete * from product where id = " + id;
            MySqlCommand MysqlCommand = new MySqlCommand(query, cnn);
            cnn.Open();

            MysqlCommand.ExecuteNonQuery();

            cnn.Close();
        }
    }
}
