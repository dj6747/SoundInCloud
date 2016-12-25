using System;
using System.Collections.Generic;

namespace SoundInCloudBackend.Models
{
    public class User
    {
        public int ID { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string email { get; set; }
    }
}