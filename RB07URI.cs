using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;
using Microsoft.Win32;
using System.IO;

namespace RB07URI
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {


            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);

            string CurrentDirectory = Directory.GetCurrentDirectory();

            try
            {

                RegistryKey Software = Registry.CurrentUser.OpenSubKey("SOFTWARE", true);
                RegistryKey Classes = Software.OpenSubKey("Classes", true);

                RegistryKey ProtocolKey = Classes.OpenSubKey("RB07", true);
                if (ProtocolKey == null)
                {

                    RegistryKey NewKey = Classes.CreateSubKey("RB07", true);

                    NewKey.SetValue("", "URL:RB07 Game URI");
                    NewKey.SetValue("URL Protocol", "RB07");
                    NewKey.SetValue("InstallPath", CurrentDirectory);

                    RegistryKey ShellKey = NewKey.CreateSubKey("shell", true);
                    RegistryKey CommandKey = ShellKey.CreateSubKey("open", true).CreateSubKey("command", true);

                    CommandKey.SetValue("", "\"" + CurrentDirectory + "\\RBLauncher.exe\" \"%1\""); // "C:\Users\user\Desktop\RB07\RBLauncher.exe" "%1"

                    MessageBox.Show("The RB07 protocol has been installed. You can now launch games from the website.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);

                } else
                {
                    DialogResult UpdateInstallDir = MessageBox.Show("The RB07 protocol is already installed. If you're running the URI installer in a new location (along with your RB07 install), the old install directory can be updated to this one and the launcher's functionality restored.\n\nWould you like to do so?\n\n(This is recommended if the launcher gave you a warning about a missing application)", "Warning", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);
                    if (UpdateInstallDir == DialogResult.Yes)
                    {

                        RegistryKey RBKey = Classes.OpenSubKey("RB07", true);
                        if (RBKey != null)
                        {
                            RBKey.SetValue("InstallPath", CurrentDirectory);

                            MessageBox.Show("The installation path for RB07's protocol has been updated and the launcher should now work as normal.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        } else
                        {
                            MessageBox.Show("An error occurred while updating the installation path for RB07. You can delete the registry key manually and re-run the URI installer to fix this issue.", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        }

                    }

                    // MessageBox.Show("You already have the RB07 protocol installed. No need to run this again.\n\nIf for any reason you need to uninstall it, it should be located in the registry at \\HKEY_CLASSES_ROOT\\RB07.", "Finished", MessageBoxButtons.OK, MessageBoxIcon.Information);
                }
               
            }
            catch (Exception e)
            {
                MessageBox.Show("The URI installer should not be run with administrative privileges, but maybe for some reason couldn't access the registry normally. (Probably the latter!) (Exception: " + e + ")", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
        }

    }
}
